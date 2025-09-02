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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // DBからゲームデータを全件取得->ゲームタイトル検索に表示する用。
        $games1 = Game::all();

        // ジャンル一覧を重複なしで取得ー＞ゲームジャンル検索用。
        $games2 = Game::select('introduction')->distinct()->get();

        return view('home', compact('games1', 'games2'));//compact=games1,2,3,4の様に複数の指定ができる。
    }
    

}
