<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\MyrecordController;
use App\Http\Controllers\API\RecommendedController;
use App\Http\Controllers\API\ToppageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login'])->name('login');
// Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/toppage', [ToppageController::class, 'index'])->name('toppage')->middleware('auth:api');
Route::get('/recommended', [RecommendedController::class, 'index'])->name('recommended');
Route::get('/myrecord', [MyrecordController::class, 'index'])->name('myrecord')->middleware('auth:api');
