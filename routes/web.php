<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotographyPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])
    ->name('home');

Route::get('/about-me', [PagesController::class, 'aboutMe'])
    ->name('about.me');

Route::get('/camera', [PhotographyPostController::class, 'index'])
    ->name('camera');

Route::get('/journal', [PostController::class, 'index'])
    ->name('journal');

Route::get('/terminal', [PagesController::class, 'terminal'])
    ->name('terminal');

Route::get('/community', [UserController::class, 'index'])
    ->name('community');

Route::get('/camera-roll/{post}', [PhotographyPostController::class, 'show'])
    ->name('camera.roll');

Route::get('/journal/{post}', [JournalController::class, 'show'])
    ->name('journal.post');

Route::get('/comments', [CommentController::class, 'index'])
    ->name('comments');
    
Route::get('/profile/{user}', [UserController::class, 'show'])
    ->name('profile');

Route::middleware('guest')->group(function () {    
    Route::post('/register', [UserController::class, 'register'])
        ->name('register.submit');
    
    Route::post('/login', [UserController::class, 'login'])
        ->name('login.submit'); 
    
    Route::get('/auth', [PagesController::class, 'auth'])
        ->name('auth');

    Route::get('/login', [PagesController::class, 'login'])
        ->name('login');

    Route::get('/register', [PagesController::class, 'register'])
        ->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/comment/{model}/{id}', [CommentController::class, 'store'])
        ->name('comment.store');
});

Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout');