<?php

namespace App\Providers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

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
        Vite::macro('image', function (string $asset) {
            return Vite::asset("resources/images/{$asset}");
        });

        Vite::macro('blinkie', function (string $asset) {
            return Vite::asset("resources/images/blinkies/{$asset}");
        });

        Vite::macro('button', function (string $asset) {
            return Vite::asset("resources/images/buttons/{$asset}");
        });

        Vite::macro('music', function (string $asset) {
            return Vite::asset("resources/images/music/{$asset}");
        });

        Vite::macro('photo', function (string $asset) {
            return Vite::asset("resources/images/photography/{$asset}");
        });

        Vite::macro('poster', function (string $asset) {
            return Vite::asset("resources/images/posters/{$asset}");
        });

        Vite::macro('stamp', function (string $asset) {
            return Vite::asset("resources/images/stamps/{$asset}");
        });

        Relation::morphMap([
            'site' => Site::class,
            'user' => User::class,
        ]);
    }
}
