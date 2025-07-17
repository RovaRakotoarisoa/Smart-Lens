<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);        
        /**
         * GATE
         */
        // GATE for Lunette
        // Gate::define('lunette_create', fn(User $user) => $user->role === 'admin');
        // Gate::define('lunette_edit', fn(User $user) => $user->role === 'admin');
        // Gate::define('lunette_delete', fn(User $user) => $user->role === 'admin');
    }
}
