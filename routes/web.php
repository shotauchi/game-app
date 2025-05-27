<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;

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

Route::post('/admin/login', function (Request $request) {
    if ($request->password === env('ADMIN_PASSWORD')) {
        session(['is_admin' => true]);
        return redirect('/admin');
    }
    return back()->withErrors(['password' => 'パスワードが違います']);
});

Route::middleware(['admin'])->group(function () {
    Route::post('/admin/logout', function (Request $request) {
        $request->session()->forget('is_admin');

        return redirect('/admin/login')->with('status', 'ログアウトしました');
    })->name('admin.logout');
    
    Route::get('/admin', function () {
        return view('admin.home');
    });
});

Route::get('/games/create', function () {
    return view('games.new');
})->name('admin.games.create');

Route::get('/consoles/create', function () {
    return view('consoles.new');
})->name('admin.consoles.create');


Route::get('/games', [GameController::class, 'index'])->name('games.index');

Route::get('/consoles', [ConsoleController::class, 'index'])->name('consoles.index');

Route::get('/performances', [PerformanceController::class, 'index'])->name('parformances.index');

Route::get('/searchs', [SearchController::class, 'index'])->name('searchs.index');

// Route::controller(GameController::class)->prefix('admin')->group(function() {
//      Route::get('game/create','add');
// });




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
