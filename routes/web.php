<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/',[HomeController::class, 'index'])->name('home');

Route::resource('item', ItemController::class);
Route::resource('catalog', CatalogController::class);



//Route::get('/', [HomeController::class, 'index'])->name('home');
