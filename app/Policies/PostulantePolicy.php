<?php

namespace App\Policies;

use App\Models\Postulante;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostulantePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true; // Permitir a todos los usuarios ver la lista de postulantes
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Postulante $postulante)
    {
        return true; // Permitir a todos los usuarios ver un postulante específico

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true; // Permitir a todos los usuarios crear nuevos postulantes

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Postulante $postulante)
    {
        return $user->id === $postulante->user_id; // Solo permitir al usuario actualizar su propio postulante

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Postulante $postulante)
    {
        return $user->id === $postulante->user_id; // Solo permitir al usuario actualizar su propio postulante

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Postulante $postulante)
    {
        return $user->id === $postulante->user_id; // Solo permitir al usuario eliminar su propio postulante

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Postulante $postulante)
    {
        //
    }
}
