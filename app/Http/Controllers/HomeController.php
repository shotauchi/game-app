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
        $mode = $request->input('mode');   // select で選んだ項目
        $keyword = $request->input('search'); // 入力したキーワード
    
        $query = Game::query();
    
        if ($mode === 'game_title') {
            // タイトルで検索（site カラムをタイトルとしている前提）
            $query->where('site', 'like', '%' . $keyword . '%');
        } elseif ($mode === 'title') {
            // ジャンルで検索（introduction カラムをジャンルとしている前提）
            $query->where('introduction', 'like', '%' . $keyword . '%');
        }
    
        $games1 = $query->get();
    
        // 他のデータも渡す
        $games2 = Game::select('introduction')->distinct()->get();
        $consoles = Console::select('id', 'introduction')->distinct()->get();
        $performances = Performance::select('id', 'CPU')->distinct()->get();
    
        return view('home', compact('games1','games2','consoles','performances'));
    }

}
