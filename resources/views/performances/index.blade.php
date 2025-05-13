@extends('layouts.app')

@section('content')
<!-- サイト名 -->
        <div class="text-center my-4">
            <h1>パフォーマンス一覧画面です</h1>
        </div>
        
        <ul>
    @forelse ($performances as $performance)
        <li>{{ $performance->title }}</li>
    @empty
        <li>パフォーマンスがありません。</li>
    @endforelse
</ul>
        
        
@endsection