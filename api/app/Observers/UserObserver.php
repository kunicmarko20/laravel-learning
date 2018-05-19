<?php

namespace App\Observers;

use App\Mail\UserCreated;
use App\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function created(User $user)
    {
        Mail::to($user)->send(new UserCreated($user));
    }
}
