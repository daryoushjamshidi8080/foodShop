<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');



Route::group(['prefix' => 'sliders'], function() {
    Route::get('/', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/{slider}/edit', [SliderController::class , 'edit'])->name('slider.edit');
    Route::put('/{slider}', [SliderController::class , 'update'])->name('slider.update');
    Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
});


Route::group(['prefix' => 'features'], function() {
    Route::get('/', [FeatureController::class , 'index'])->name('feature.index');
    Route::get('/create', [FeatureController::class, 'create'])->name('feature.create');
    Route::post('/', [FeatureController::class, 'store'])->name('feature.store');
    Route::get('/{feature}/edit', [FeatureController::class , 'edit'])->name('feature.edit');
    Route::put('/{feature}', [FeatureController::class , 'update'])->name('feature.update');
    Route::delete('/{feature}', [FeatureController::class, 'destroy'])->name('feature.destroy');
});


Route::group(['prefix' => 'about-us'], function() {
    Route::get('/', [AboutUsController::class, 'index'])->name('about.index');
    Route::get('/{about}/edit', [AboutUsController::class , 'edit'])->name('about.edit');
    Route::put('/{about}', [AboutUsController::class , 'update'])->name('about.update');
});



Route::group(['prefix' => 'contact'], function() {
    Route::get('/', [ContactUsController::class, 'index'])->name('contact.index');
    Route::get('/{message}', [ContactUsController::class , 'show'])->name('contact.show');
    Route::delete('/{message}', [ContactUsController::class , 'destroy'])->name('contact.destroy');
});




Route::group(['prefix' => 'footer'], function() {
    Route::get('/', [FooterController::class, 'index'])->name('footer.index');
    Route::get('/{footer}/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/{footer}', [FooterController::class , 'update'])->name('footer.update');
});
