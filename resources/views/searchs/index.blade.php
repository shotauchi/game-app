@extends('layouts.app')

@section('content')
<!-- サイト名 -->
        <div class="text-center my-4">
            <h1>サーチ一覧画面です</h1>
        </div>
        
        <ul>
    @forelse ($searchs as $search)
        <li>{{ $search->title }}</li>
    @empty
        <li>サーチがありません。</li>
    @endforelse
</ul>
        
        
@endsection