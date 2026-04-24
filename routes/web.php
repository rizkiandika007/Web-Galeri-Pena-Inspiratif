<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'beranda'])->name('home');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');
Route::get('/tentang-kami', [HomeController::class, 'tentangKami'])->name('tentangKami');
Route::get('/post/{slug}', [HomeController::class, 'detailPost'])->name('post.detail');
Route::get('/agenda/{id}', [HomeController::class, 'detailAgenda'])->name('agenda.detail');
