<?php

use App\Http\Controllers\home;
use App\Http\Controllers\webtest;
use Illuminate\Support\Facades\Artisan;
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

// 測試
Route::get('/123', [webtest::class, 'test']);

Route::get('/', home::class)->name('/');

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

// 清除快取
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    return "已經清除快取";
});

// 例外
Route::fallback( function () {
    return to_route('/');
    // return redirect()->to_route('home');
    // HTTP_NOT_FOUND
    // return abort(404);
});
