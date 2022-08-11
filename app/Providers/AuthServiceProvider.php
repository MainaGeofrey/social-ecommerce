<?php

namespace App\Providers;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //assign role super-admin all permissions implicitly
        Gate::before(function ($user, $ability) {
          return $user->hasRole('super-admin') ? true : null;
      });

              //prevent super admin from doing things that the all does not allow
              Gate::after(function($user, $ability){
                return $user->hasRole('super-admin') ? true : null;
              });
    }


}
