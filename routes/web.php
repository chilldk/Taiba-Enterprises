<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/portfolio', [HomeController::class, 'about'])->name('portfolio');
Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/admin', [AdminController::class, 'login'])->name('login');

