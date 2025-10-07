<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Console;
use App\Models\Performance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index(Request $request)
    {
        // --- 既存の処理（変更なし） ---
        // ゲームの最新3件
        $games1 = Game::orderBy('created_at', 'desc')->take(3)->get();

        // ジャンル一覧
        $games2 = Game::select('introduction')->distinct()->get();

        // --- コンソール検索 ---
        $consolesQuery = Console::query();
        $modeMapConsole = [
            'introduction' => 'introduction',
            'manufacturer' => 'Manufacturer',
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
        $modeMapPerformance = [
            'CPU' => 'CPU',
            'GPU' => 'GPU',
            'RAM' => 'RAM',
        ];
        $performanceSearch = trim((string) $request->input('performance_search', ''));
        if ($performanceSearch !== '') {
            $term = mb_convert_kana($performanceSearch, 's');
            $like = '%' . $term . '%';
            $mode = $request->input('performance_mode', 'all');

            if ($mode === 'all') {
                $performancesQuery->where(function ($q) use ($like) {
                    $q->where('CPU', 'like', $like)
                      ->orWhere('GPU', 'like', $like)
                      ->orWhere('RAM', 'like', $like);
                });
            } elseif (isset($modeMapPerformance[$mode])) {
                $col = $modeMapPerformance[$mode];
                $performancesQuery->where($col, 'like', $like);
            }
        }
        $performances = $performancesQuery->get();

        // --- ここから最終更新日を取得してビューへ渡す ---
        // キャッシュ (5分) を利用して DB 呼び出しを抑える
        $lastUpdated = Cache::remember('site_last_updated', now()->addMinutes(5), function () {
            $dates = [
                Game::max('updated_at'),
                Console::max('updated_at'),
                Performance::max('updated_at'),
            ];
            // null を除いて最大値を取る
            $max = collect($dates)->filter()->max();
            return $max ? Carbon::parse($max) : null;
        });

        // タイムゾーンを明示（config/app.php の timezone を使う。無ければ Asia/Tokyo）
        if ($lastUpdated) {
            $lastUpdated->setTimezone(config('app.timezone', 'Asia/Tokyo'));
        }

        // ビューに渡す
        return view('home', compact('games1', 'games2', 'consoles', 'performances', 'lastUpdated'));
    }

    public function search(Request $request)
    {
        $mode = $request->input('mode', 'game_title');
        $keyword = trim($request->input('search', ''));

        $query = Game::query();

        if ($keyword !== '') {
            if ($mode === 'game_title') {
                $query->where('site', 'like', '%' . $keyword . '%');
            } elseif ($mode === 'site' || $mode === 'title') {
                $query->where('introduction', 'like', '%' . $keyword . '%');
            }
            $games1 = $query->get();
        } else {
            $games1 = Game::orderBy('created_at', 'desc')->take(3)->get();
        }

        $games2 = Game::select('introduction')->distinct()->get();
        $consoles = Console::select('id', 'introduction', 'name', 'Manufacturer')->distinct()->get();
        $performances = Performance::select('id', 'CPU')->distinct()->get();

        // search でも同じ最終更新日を渡す（キャッシュが効く）
        $lastUpdated = Cache::remember('site_last_updated', now()->addMinutes(5), function () {
            $dates = [
                Game::max('updated_at'),
                Console::max('updated_at'),
                Performance::max('updated_at'),
            ];
            $max = collect($dates)->filter()->max();
            return $max ? Carbon::parse($max) : null;
        });
        if ($lastUpdated) {
            $lastUpdated->setTimezone(config('app.timezone', 'Asia/Tokyo'));
        }

        return view('home', compact('games1','games2','consoles','performances','lastUpdated'));
    }
}
