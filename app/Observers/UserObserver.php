<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Profile;

class UserObserver
{
    public function created(User $user)
    {
        $user->update([
            'slug' => strtolower($user->first_name) . '-' . strtolower($user->last_name) . '-' . $user->id
        ]);

        Profile::create([
            'user_id' => $user->id
        ]);
    }

    public function deleting(User $user)
    {
        $user->profile->delete();
    }
}
