<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Importación fundamental

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Forzamos HTTPS siempre que la app no esté corriendo de forma local en tu PC
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
