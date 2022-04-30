<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function admin(User $user)
    {
        //
        $users = $user->Role()->pluck('roles_id');
        foreach ($users as $key => $id) {
            if ($id == 1)
                return true;
        }
    }

    public function level2(User $user)
    {
        //
        $users = $user->Role()->pluck('roles_id');
        foreach ($users as $key => $id) {
            if ($id == 3)
                return true;
        }
    }

    public function anyView(User $user)
    {
        $users = $user->Role()->pluck('roles_id');
        foreach ($users as $key => $id) {
            if ($id != 2)
                return true;
        }
    }
}
