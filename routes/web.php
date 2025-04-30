<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\ConsoleController;
use App\Http\Controllers\Admin\PerformanceController;
use App\Http\Controllers\Admin\SearchController;
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

Route::controller(GameController::class)->prefix('admin')->group(function() {
     Route::get('game/create','add');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
