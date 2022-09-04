<?php

use App\Http\Controllers\home;
use App\Http\Controllers\upload;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', home::class);
Route::post('home', [home::class, 'homeSubmit']);




// image.upload
// Route::post('images/upload', upload::class);
// Route::post('images/upload', [upload::class, 'test']);
