<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::get('/about', function () {
    return view('about_us');
})->name('about_us');


Route::get('/about', function () {
    return view('about_us');
})->name('about_us');

// Route::get('/contact', function(){
//     return view('contact_page');
// })->name('contact');

Route::get('/contact', [ContactUsController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');


Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/menu', [ProductController::class, 'menu'])->name('product.menu');
