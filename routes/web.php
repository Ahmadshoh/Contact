<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;

Route::get('/', function () {
    return redirect()->route('contact.index');
});

Route::resource('contact', MainController::class, ['admin'])->except('show');
Route::get('/search', [MainController::class, 'search'])->name('search');
