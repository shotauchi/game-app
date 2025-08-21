<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // DBからゲームデータを全件取得
        $games = Game::all();

        // view に渡す
        return view('home', compact('games'));
    }
}
