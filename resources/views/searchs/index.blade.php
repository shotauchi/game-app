@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('content')
<body class="game-layout">   {{-- 追加 --}}

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