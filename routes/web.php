<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\SearchController;
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
    return view('home');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/games', [GameController::class, 'index'])->name('games.index');

Route::get('/consoles', [ConsoleController::class, 'index'])->name('consoles.index');

Route::get('/performances', [PerformanceController::class, 'index'])->name('parformances.index');

Route::get('/searchs', [SearchController::class, 'index'])->name('searchs.index');

// Route::controller(GameController::class)->prefix('admin')->group(function() {
//      Route::get('game/create','add');
// });




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
