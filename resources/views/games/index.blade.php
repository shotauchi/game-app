@extends('layouts.app')

@section('content')
<!-- サイト名 -->
        <div class="text-center my-4">
            <h1>ゲーム一覧画面です</h1>
        </div>
        
        <ul>
    @forelse ($games as $game)
        <li>{{ $game->title }}</li>
    @empty
        <li>ゲームがありません。</li>
    @endforelse
</ul>
        
        
@endsection
