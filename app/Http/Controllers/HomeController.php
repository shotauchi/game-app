<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;

use App\Models\Console;

use App\Models\Performance;

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
            // ゲームの最新3件を取得
            // created_at がある場合（推奨）
        $games1 = Game::orderBy('created_at', 'desc')->take(3)->get();

        // ジャンル一覧を重複なしで取得ー＞ゲームジャンル検索用。
        $games2 = Game::select('introduction')->distinct()->get();
        
        // コンソール
        $consoles = Console::select('id', 'introduction')->distinct()->get();
        
        // パフォーマンス
        $performances = Performance::select('id', 'CPU')->distinct()->get();
        
        // まとめてビューへ渡す
        return view('home', compact('games1','games2','consoles','performances'));
    }
    
    public function search(Request $request)
    {
        $mode = $request->input('mode', 'game_title'); // デフォルトは game_title
    $keyword = trim($request->input('search', ''));

    $query = Game::query();

    if ($keyword !== '') {
        if ($mode === 'game_title') {
            // site カラムをゲームタイトルとして検索（部分一致）
            $query->where('site', 'like', '%' . $keyword . '%');
        } elseif ($mode === 'genre' || $mode === 'title') {
            // introduction カラムをジャンルとして検索
            $query->where('introduction', 'like', '%' . $keyword . '%');
        }

        // 検索結果を取得
        $games1 = $query->get();
    } else {
        // キーワードが空ならデフォルト表示（最新3件）
        $games1 = Game::orderBy('created_at', 'desc')->take(3)->get();
    }

    // 他のデータ
    $games2 = Game::select('introduction')->distinct()->get();
    $consoles = Console::select('id', 'introduction')->distinct()->get();
    $performances = Performance::select('id', 'CPU')->distinct()->get();

    return view('home', compact('games1','games2','consoles','performances'));
    }

}
