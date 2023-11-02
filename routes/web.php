<?php

use Illuminate\Support\Facades\Route;

//uso il controller per il file welcome.blade.php
use App\Http\Controllers\Guests\PageController;

use App\Http\Controllers\Admin\ComicController;

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

//cambio rotta verso il controller che si occupa del file welcome.blade.php per la home
Route::get('/', [PageController::class, 'welcome'])->name('home'); //home
Route::get('/comics', [PageController::class, 'comics'])->name('guests.comics'); //comics page
Route::get('/comics/{comic}', [PageController::class, 'comic_details'])->name('guests.comics.show'); //comics page

#admin
Route::resource('admin/comics', ComicController::class);
