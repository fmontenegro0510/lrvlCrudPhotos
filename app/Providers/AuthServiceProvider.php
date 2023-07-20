<?php

namespace App\Providers;


use App\Models\Postulante;
use App\Policies\PostulantePolicy;
use App\Models\Concurso;
use App\Policies\ConcursoPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Postulante::class => PostulantePolicy::class,
        Concurso::class => ConcursoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
