<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Performance;

use App\Models\Console;

class PerformanceController extends Controller
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
        $performances = Performance::all();
        return view('performances.index', compact('performances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consoles = Console::all();
        return view('performances.new', compact('consoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'console_id' => 'required|exists:consoles,id',
            'GPU' => 'required|string|max:255',
            'CPU' => 'required|string|max:255',
        ]);
        
        Performance::create($validated);
        
        return redirect()->route('performances.create')->with('success', 'Performance created successfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Performance $performance)
    {
    return view('performances.show', compact('performance'));
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
    $performance = Performance::findOrFail($id);

    // ② 編集用のビューにデータを渡して表示
    return view('performances.edit', compact('performance'));
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
        $performance = Performance::findOrFail($id);

    $validated = $request->validate([
        'CPU' => 'required|string|max:255',
        'GPU' => 'required|string|max:255',
    ]);

    $performance->update($validated);

    return redirect()->route('performances.index')->with('success', 'パフォーマンスを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $performance = Performance::findOrFail($id);
    $performance->delete();

    return redirect()->route('performances.index')->with('success', 'パフォーマンスを削除しました');
    }
}
