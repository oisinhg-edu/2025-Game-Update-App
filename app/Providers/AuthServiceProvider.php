<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('manage-game', fn(User $user) => $user->role === 'admin');
        Gate::define('manage-developer', fn(User $user) => $user->role === 'admin');
        // Gate::define('edit-game', fn(User $user) => in_array($user->role, ['admin', 'editor']));
    }
}
