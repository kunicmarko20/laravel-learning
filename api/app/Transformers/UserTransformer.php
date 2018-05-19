<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'isVerified' => $user->isVerified(),
            'isAdmin' => $user->isAdmin(),
            'creationDate' => $user->created_at,
            'lastChange' => $user->updated_at,
        ];
    }
}
