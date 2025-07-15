<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Performance;

use App\Models\Console;

class PerformanceController extends Controller
{
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
        //dd($request->all());
        $performance = new Performance;
        $form = $request->all();
        $performance->fill($form);
        $performance->save();
        return redirect()->route('admin.performances.create')->with('success', 'Performance created successfully!');
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
        $performance = Performance::findOrFail($id); // IDに該当するゲーム情報を取得
    $performance->edit();               // データベースを編集

    return redirect()->route('performances.index')->with('success', 'パフォーマンスを編集しました');
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
        //
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
