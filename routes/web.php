<?php

use App\Http\Controllers\BanController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotographyPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SketchController;
use App\Http\Controllers\ThoughtController;
use App\Http\Controllers\UserController;
use App\Models\Sketch;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])
    ->name('home');

Route::get('/about-me', [PagesController::class, 'aboutMe'])
    ->name('aboutme');

Route::get('/decobar', [PagesController::class, 'decobar'])
    ->name('decobar');

Route::get('/sidebar', [PagesController::class, 'sidebar'])
    ->name('sidebar');

Route::get('/terminal', [PagesController::class, 'terminal'])
    ->name('terminal');

Route::get('/welcome', [PagesController::class, 'welcome'])
    ->name('welcome');


Route::middleware('guest')->group(function () {
    Route::get('/auth', [PagesController::class, 'auth'])
        ->name('auth');

    Route::post('/register', [UserController::class, 'register'])
        ->name('register.submit');

    Route::post('/login', [UserController::class, 'login'])
        ->name('login.submit');
});

Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout');



Route::middleware('auth')->group(function () {
    Route::post('/comments/{model}/{id}', [CommentController::class, 'store'])
        ->name('comment.store');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comment.destroy');

    Route::post('/profile/edit', [UserController::class, 'update'])
        ->name('profile.update');

    Route::get('/profile/edit', [UserController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/ban-self', [BanController::class, 'ban'])
        ->name('ban.self');
});



Route::get('/posts', [PostController::class, 'index'])
    ->name('journal');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('journal.post');

Route::get('/photography-posts', [PhotographyPostController::class, 'index'])
    ->name('camera');

Route::get('/photography-posts/{photographyPost}', [PhotographyPostController::class, 'show'])
    ->name('camera.roll');

Route::get('/users', [UserController::class, 'index'])
    ->name('community');

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('profile');

Route::get('/comments', [CommentController::class, 'index'])
    ->name('comments');

Route::get('/thoughts', [ThoughtController::class, 'index'])
    ->name('thoughts');

Route::get('/sketches', [SketchController::class, 'index'])
    ->name('sketches');

Route::get('/sketches/{sketch}', [SketchController::class, 'show'])
    ->name('sketch');