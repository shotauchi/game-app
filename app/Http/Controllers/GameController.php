<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;

use App\Models\Performance;

use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
        public function __construct()
    {
        $this->middleware('admin')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games')); // ビューへ渡す
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $performances = Performance::all();
        
        return view('games.new', compact('performances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // バリデーション（適切な条件に調整可）
    $request->validate([
        'performance_id' => 'required|exists:performances,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'site' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'introduction' => 'required|string'
    ]);

    //dd($request);
    $form = $request->all();

    // 画像ファイルの保存処理
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public'); // app/public/storage/images に保存
        $form['image'] = $path; // DBには images/ファイル名 が入る
    }

    $game = new Game();
    $game->fill($form);
    $game->save();

    return redirect()->route('games.create')->with('success', 'Game created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    // ① 該当ゲームデータを取得
    $game = Game::findOrFail($id);

    // ② 編集用のビューにデータを渡して表示
    return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

    $validated = $request->validate([
        'image' => 'required|string|max:255',
        'url' => 'required|string|max:255',
        'site' => 'required|string|max:255',
        'introduction' => 'required|string',
    ]);

    $game->update($validated);

    return redirect()->route('games.index')->with('success', 'ゲームを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::findOrFail($id); // IDに該当するゲーム情報を取得
        
        // 画像が存在していたらストレージから削除
    if ($game->image && Storage::disk('public')->exists($game->image)) {
        Storage::disk('public')->delete($game->image);
    }
    
    $game->delete();               // データベースから削除

    return redirect()->route('games.index')->with('success', 'ゲームを削除しました');
    
    
    }
    
    
}
