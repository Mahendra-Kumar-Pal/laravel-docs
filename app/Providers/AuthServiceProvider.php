<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\{Gate, Auth};
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user){
            return $user->role == 'admin';
        });
        Gate::define('isEmployee', function($user){
            return $user->role == 'employee';
        });
        Gate::define('view', function($user, $editUser){
            // dd($user->toArray());
            // dd($editUser);
            return $user->id == $editUser;
        });
        // Gate::define('view', 'App\Policies\UserPolicy@view');
    }
}
