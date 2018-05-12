<?php

namespace App;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const USER_VERIFIED = '1';
    const USER_UNVERIFIED = '0';

    const USER_ADMIN = 'true';
    const USER_REGULAR = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    protected $table = 'users';

    public function isVerified(): bool
    {
        return $this->verified == User::USER_VERIFIED;
    }

    public function isAdmin(): bool
    {
        return $this->admin == User::USER_ADMIN;
    }

    public static function generateVerificationCode()
    {
        return str_random(40);
    }

    public static function fromUserStore(UserStoreRequest $request): self
    {
        $user = new self();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->updatePassword($request->password);
        $user->verified = self::USER_UNVERIFIED;
        $user->verification_token = self::generateVerificationCode();
        $user->admin = self::USER_REGULAR;

        $user->save();

        return $user;
    }

    private function updatePassword($password)
    {
        $this->password = bcrypt($password);
    }

    public function updateFromUserUpdate(UserUpdateRequest $request): self
    {
        if ($request->has('name')) {
            $this->name = $request->name;
        }

        if ($request->has('email')) {
            $this->unverify();
            $this->email = $request->email;
        }

        if ($request->has('password')) {
            $this->updatePassword($request->get('password'));
        }

        $this->save();

        return $this;
    }

    public function unverify(): void
    {
        $this->verified = self::USER_UNVERIFIED;
        $this->verification_token = self::generateVerificationCode();
    }
}
