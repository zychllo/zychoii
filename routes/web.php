<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing page with King of Spades
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Main portfolio page with 14-sided die navigation
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

// Legacy routes (keeping for compatibility)
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
