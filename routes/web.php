<?php

use App\Http\Controllers\AdsController;
use App\Models\Ads;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $ads = Ads::all();
    return view('welcome', ['ads' => $ads]);
})->name('home');


// route for ads

Route::resource('ads', AdsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
