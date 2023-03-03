<?php

use App\Http\Controllers\Web\ApiDescriptionController;
use App\Http\Controllers\Web\DatabaseDescriptionController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\MyrecordController;
use App\Http\Controllers\Web\RecommendedController;
use App\Http\Controllers\Web\ToppageController;
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

// Website route
Route::get('/', function() {
    return view('welcome');
});
Route::get('/login', function() {
    return redirect('/');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/toppage', [ToppageController::class, 'index'])->name('toppage')->middleware('auth');

Route::get('/recommended', [RecommendedController::class, 'index'])->name('recommended');

Route::get('/myrecord', [MyrecordController::class, 'index'])->name('myrecord')->middleware('auth');

Route::get('/database-description', [DatabaseDescriptionController::class, 'index'])->name('databaseDescription');
Route::get('/api-description', [ApiDescriptionController::class, 'index'])->name('apiDescription');
