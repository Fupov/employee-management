<?php

namespace App\Policies;

use App\Messages;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagesPolicy
{
    use HandlesAuthorization;
    public function before(User $user, $ability)
    {
        if($user->isAdmin()){
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Messages  $messages
     * @return mixed
     */
    public function view(User $user, Messages $messages)
    {
        return $user->id === $messages->to_id ;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Messages  $messages
     * @return mixed
     */
    public function update(User $user, Messages $messages)
    {
        return $user->id === $messages->from_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Messages  $messages
     * @return mixed
     */
    public function delete(User $user, Messages $messages)
    {
        return $user->id === $messages->from_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Messages  $messages
     * @return mixed
     */
    public function restore(User $user, Messages $messages)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Messages  $messages
     * @return mixed
     */
    public function forceDelete(User $user, Messages $messages)
    {
        //
    }
}
