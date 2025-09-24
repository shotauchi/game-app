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
    public function index(Request $request)
    {
    
    // ゲームの最新3件
    $games1 = Game::orderBy('created_at', 'desc')->take(3)->get();

    // ジャンル一覧
    $games2 = Game::select('introduction')->distinct()->get();

    // --- コンソール検索（既に実装済みのはず） ---
    $consolesQuery = Console::query();
    $modeMapConsole = [
        'introduction' => 'introduction',
        'manufacturer' => 'Manufacturer', // DBのカラム名に合わせる
        'use' => 'use',
        'name' => 'name',
    ];
    $consoleSearch = trim((string) $request->input('console_search', ''));
    if ($consoleSearch !== '') {
        $term = mb_convert_kana($consoleSearch, 's');
        $like = '%' . $term . '%';
        $mode = $request->input('console_mode', 'all');
        if ($mode === 'all') {
            $consolesQuery->where(function($q) use($like) {
                $q->where('introduction','like',$like)
                  ->orWhere('Manufacturer','like',$like)
                  ->orWhere('use','like',$like)
                  ->orWhere('name','like',$like);
            });
        } elseif (isset($modeMapConsole[$mode])) {
            $consolesQuery->where($modeMapConsole[$mode], 'like', $like);
        }
    }
    $consoles = $consolesQuery->get();

    // --- パフォーマンス検索 ---
    $performancesQuery = Performance::query();

    // ホワイトリスト：フォームの値 => DBカラム名（実際のスキーマに合わせて修正）
    $modeMapPerformance = [
        'CPU' => 'CPU',
        'GPU' => 'GPU',
        'RAM' => 'RAM',
    ];

    $performanceSearch = trim((string) $request->input('performance_search', ''));

    if ($performanceSearch !== '') {
        // 半角/全角スペースを正規化（任意）
        $term = mb_convert_kana($performanceSearch, 's');
        $like = '%' . $term . '%';
        $mode = $request->input('performance_mode', 'all');

        if ($mode === 'all') {
            $performancesQuery->where(function ($q) use ($like) {
                // 表示したいカラムをここに列挙（DBに無いカラムは削除）
                $q->where('CPU', 'like', $like)
                  ->orWhere('GPU', 'like', $like)
                  ->orWhere('RAM', 'like', $like);
            });
        } elseif (isset($modeMapPerformance[$mode])) {
            $col = $modeMapPerformance[$mode];
            $performancesQuery->where($col, 'like', $like);
        }
    }

    // 結果取得（大量データなら paginate を検討）
    $performances = $performancesQuery->get();

    // ビューに渡す
    return view('home', compact('games1', 'games2', 'consoles', 'performances'));
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
        } elseif ($mode === 'site' || $mode === 'title') {
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
    //$consoles = Console::select('id', 'introduction')->distinct()->get();
    // 必要なカラムを全部渡す（簡単）
    $consoles = Console::select('id', 'introduction', 'name', 'Manufacturer')->distinct()->get();

    $performances = Performance::select('id', 'CPU')->distinct()->get();

    return view('home', compact('games1','games2','consoles','performances'));
    }

}
