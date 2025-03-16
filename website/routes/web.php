<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::get('/about', function(){
    return view('about_us');
})->name('about_us');


Route::get('/about', function(){
    return view('about_us');
})->name('about_us');

Route::get('/contact', function(){
    return view('contact_page');
})->name('contact');
