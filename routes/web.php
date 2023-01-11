<?php

use App\Http\Controllers\home;
use App\Http\Controllers\webtest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', home::class);
Route::post('home', [home::class, 'homeSubmit']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/123', [webtest::class, 'test']);

Route::get('/clear', function() {

    Artisan::call('cache:clear');

    return "已經清除快取";
});
