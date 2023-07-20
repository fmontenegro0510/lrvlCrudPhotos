<?php

namespace App\Policies;

use App\Models\Concurso;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConcursoPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Concurso $concurso)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true; // Permitir a todos los usuarios crear nuevos concursos

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Concurso $concurso)
    {
        return $user->id === $concurso->postulante->user_id; // Solo permitir al usuario actualizar su propio concurso

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Concurso $concurso)
    {
        return $user->id === $concurso->postulante->user_id; // Solo permitir al usuario eliminar su propio concurso
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Concurso $concurso)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concurso  $concurso
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Concurso $concurso)
    {
        //
    }
}
