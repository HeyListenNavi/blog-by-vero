<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])
  ->name('home');

Route::get('/about-me', [PagesController::class, 'aboutMe'])
  ->name('about-me');

Route::get('/journal', [PagesController::class, 'journal'])
  ->name('journal');

Route::get('/camera-roll', [PagesController::class, 'cameraRoll'])
  ->name('camera-roll');

Route::get('journal/{post}', [JournalController::class, 'show'])
  ->name('journal.post');