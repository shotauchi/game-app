<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Console;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consoles = Console::all();
        return view('consoles.index', compact('consoles'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Console::create('/consoles/create');
        $console = new Console;
        $form = $request->all();
        $console->fill($form);
        $console->save();
        return redirect()->route('consoles.create')->with('success','Console created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    $console = Console::findOrFail($id);

    // ② 編集用のビューにデータを渡して表示
    return view('consoles.edit', compact('console'));
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
        $console = Console::findOrFail($id);

    $validated = $request->validate([
        'use' => 'required|string|max:255',
        'introduction' => 'required|string',
        'Manufacturer' => 'required|string|max:255', 
    ]);

    $console->update($validated);

    return redirect()->route('consoles.index')->with('success', 'コンソールを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $console = Console::findOrFail($id);
    $console->delete();

    return redirect()->route('consoles.index')->with('success', 'コンソールを削除しました');
    }
}
