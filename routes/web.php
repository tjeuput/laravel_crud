<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function(){
    return view('home', ['title' => 'Home page']);
});
Route::get('/blog', [PostController::class, 'index']);

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About page']);
});
