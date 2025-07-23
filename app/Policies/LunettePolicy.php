<?php

namespace App\Policies;

use App\Models\Lunette;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
// use Illuminate\Auth\Access\HandlesAuthorization;

class LunettePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lunette $lunette): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        // if ($user->role == 'admin') {
        //     return true;
        // }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lunette $lunette): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lunette $lunette): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lunette $lunette): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lunette $lunette): bool
    {
        return false;
    }
}
