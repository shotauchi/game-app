@extends('layouts.app')

@section('content')
<div class="text-center my-5">
    <h1>編集画面一覧です。</h1>
    <p>パフォーマンス名: {{ $performance->site }}</p>
    <p>紹介文: {{ $performance->introduction }}</p>
    <!-- 実際の編集フォームをここに追加しても良い -->
</div>
@endsection
