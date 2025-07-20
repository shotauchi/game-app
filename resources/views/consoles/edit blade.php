@extends('layouts.app')

@section('content')
<div class="text-center my-5">
    <h1>編集画面一覧です。</h1>
    <p>コンソール名: {{ $console->site }}</p>
    <p>紹介文: {{ $console->introduction }}</p>
    <!-- 実際の編集フォームをここに追加しても良い -->
</div>
@endsection
