<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->update([
            'slug' => strtolower($user->first_name) . '-' . strtolower($user->last_name) . '-' . $user->id
        ]);
    }

    public function deleting(User $user)
    {
        //
    }
}
