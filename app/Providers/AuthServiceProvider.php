<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('delete-comment', function ($user, Comment $comment) {
            return $user->id === $comment->user->id || $user->id === $comment->commentable->id;
        });
    }
}
