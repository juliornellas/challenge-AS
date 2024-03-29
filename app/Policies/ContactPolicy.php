<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contact $contact): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): Response
    {
        return $user
        ? Response::allow()
        : Response::deny("You're not logged in to create a contact");
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contact $contact): Response
    {
        return $user->id === $contact->user_id
        ? Response::allow()
        : Response::deny("You're not authorized to update this contact");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contact $contact): Response
    {
        return $user->id === $contact->user_id
        ? Response::allow()
        : Response::deny("You're not authorized to delete this contact");

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Contact $contact): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Contact $contact): bool
    {
        //
    }
}