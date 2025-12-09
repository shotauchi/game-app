<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;

use App\Models\Performance;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use Intervention\Image\ImageManagerStatic as Image;

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

    $form = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // 安全なファイル名を作成
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName = Str::slug($originalName) . '-' . time();
            $ext = $file->getClientOriginalExtension();

            // ① 原寸を public ディスクの images に保存
            $originalFilename = $safeName . '.' . $ext;
            $path = $file->storeAs('images', $originalFilename, 'public'); // 返り値: images/xxx.png
            $form['image'] = $path;

            // ② サムネイルを作成して public/images/thumbnails に保存（例: 200x200）
            $thumbnailImage = Image::make($file->getRealPath())
                ->fit(200, 200)       // 必要に応じて resize(...) に変更
                ->encode('jpg', 80);  // jpeg に変換（品質80）

            $thumbnailFilename = $safeName . '.jpg';
            $thumbnailPath = 'images/thumbnails/' . $thumbnailFilename;

            Storage::disk('public')->put($thumbnailPath, (string) $thumbnailImage);
            // （DB に thumbnail カラムを追加する設計でなければ、モデルアクセサで生成参照します）
        }

        $game = new Game();
        $game->fill($form);
        $game->save();

        return redirect()->route('games.create')->with('success', 'Game created successfully!');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        // 画像更新を許可する場合は image を file として受け取れるように修正
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required|string|max:255',
            'site' => 'required|string|max:255',
            'introduction' => 'required|string',
            'performance_id' => 'required|exists:performances,id',
        ]);

        // 画像がアップされたら古い原寸・サムネイルを削除して新しいものを保存
        if ($request->hasFile('image')) {
            // 古いファイル削除（あれば）
            if ($game->image && Storage::disk('public')->exists($game->image)) {
                Storage::disk('public')->delete($game->image);
            }
            // 古いサムネイル
            $oldBasename = pathinfo($game->image ?? '', PATHINFO_FILENAME);
            if ($oldBasename) {
                $oldThumb = 'images/thumbnails/' . $oldBasename . '.jpg';
                if (Storage::disk('public')->exists($oldThumb)) {
                    Storage::disk('public')->delete($oldThumb);
                }
            }

            // 新しい原寸とサムネイルを保存（store と同じ処理）
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName = Str::slug($originalName) . '-' . time();
            $ext = $file->getClientOriginalExtension();
            $originalFilename = $safeName . '.' . $ext;
            $path = $file->storeAs('images', $originalFilename, 'public');
            $validated['image'] = $path;

            $thumbnailImage = Image::make($file->getRealPath())
                ->fit(200, 200)
                ->encode('jpg', 80);
            $thumbnailFilename = $safeName . '.jpg';
            $thumbnailPath = 'images/thumbnails/' . $thumbnailFilename;
            Storage::disk('public')->put($thumbnailPath, (string) $thumbnailImage);
        }

        $game->update($validated);

        return redirect()->route('games.index')->with('success', 'ゲームを更新しました');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);

        // 原寸削除
        if ($game->image && Storage::disk('public')->exists($game->image)) {
            Storage::disk('public')->delete($game->image);
        }

        // サムネイル削除（同名の basename を使って jpg として保存している前提）
        if ($game->image) {
            $basename = pathinfo($game->image, PATHINFO_FILENAME);
            $thumbPath = 'images/thumbnails/' . $basename . '.jpg';
            if (Storage::disk('public')->exists($thumbPath)) {
                Storage::disk('public')->delete($thumbPath);
            }
        }

        $game->delete();

        return redirect()->route('games.index')->with('success', 'ゲームを削除しました');
    }
    
}
