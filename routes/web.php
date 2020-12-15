<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\TweetController;
use \App\Http\Controllers\ProfilesController;
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
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index']);
    Route::post('/tweets', [TweetController::class, 'store']);
    Route::get('/profiles/{user:name}', [ProfilesController::class, 'show'])->name('profile');
    Route::post('/follow/{id:id}', [ProfilesController::class, 'follow']);
});




require __DIR__.'/auth.php';
