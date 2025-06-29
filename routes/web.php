<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotographyPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])
    ->name('home');

Route::get('/about-me', [PagesController::class, 'aboutMe'])
    ->name('about.me');

Route::get('/camera', [PagesController::class, 'camera'])
    ->name('camera');

Route::get('/camera-roll/{post}', [PhotographyPostController::class, 'show'])
    ->name('camera.roll');

Route::get('/journal', [PagesController::class, 'journal'])
    ->name('journal');

Route::get('/journal/{post}', [JournalController::class, 'show'])
    ->name('journal.post');

Route::get('/login', [PagesController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');
