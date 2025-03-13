<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');



Route::group(['prefix' => 'sliders'], function() {

    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/', [SliderController::class, 'store'])->name('slider.store');

});
