@extends('layouts.app')

@section('content')
<!-- サイト名 -->
        <div class="text-center my-4">
            <h1>コンソール一覧画面です</h1>
        </div>
        
        <ul>
    @forelse ($consoles as $console)
        <li>{{ $console->title }}</li>
    @empty
        <li>コンソールがありません。</li>
    @endforelse
</ul>
        
        
@endsection