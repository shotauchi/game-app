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

//ログインした状態で実行するリクエスト。
Route::middleware(['admin'])->group(function () { 
    Route::post('/admin/logout', function (Request $request) {
        $request->session()->forget('is_admin');

        return redirect('/admin/login')->with('status', 'ログアウトしました');
    })->name('admin.logout');
    
    Route::get('/admin', function () {
        return view('admin.home');
    });
    Route::get('/consoles/create', function () {
        return view('consoles.new');
    })->name('admin.consoles.create');
    
    Route::post('/consoles/create', [ConsoleController::class, 'store'])->name('consoles.store');
    
    Route::delete('/consoles/{id}', [ConsoleController::class, 'destroy'])->name('consoles.destroy');
    
    Route::post('/consoles/{id}', [ConsoleController::class, 'edit'])->name('consoles.edit');
    
    Route::get('/consoles/{id}', [ConsoleController::class, 'edit'])->name('consoles.edit');
    
    // Route::get('/performances/create', function () {
    //     return view('performances.new');
    // })->name('admin.performances.create');
    Route::get('/performances/create', [PerformanceController::class, 'create'])->name('admin.performances.create');
    
    Route::post('/performances/create', [PerformanceController::class, 'store'])->name('performances.store');
    
    Route::delete('/performances/{id}', [PerformanceController::class, 'destroy'])->name('performances.destroy');
    
    Route::get('/performances/{id}', [PerformanceController::class, 'edit'])->name('performances.edit');
    
    Route::get('/games/create', [GameController::class, 'create'])->name('admin.games.create');
    
    Route::post('/games/create', [GameController::class, 'store'])->name('games.store');
    
    Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
    
    // 編集画面用ルート
    //Route::post('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
    
    Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');

    
});



Route::get('/games', [GameController::class, 'index'])->name('games.index');

Route::get('/consoles', [ConsoleController::class, 'index'])->name('consoles.index');

Route::get('/performances', [PerformanceController::class, 'index'])->name('performances.index');

Route::get('/searchs', [SearchController::class, 'index'])->name('searchs.index');

// Route::controller(GameController::class)->prefix('admin')->group(function() {
//      Route::get('game/create','add');
// });




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
