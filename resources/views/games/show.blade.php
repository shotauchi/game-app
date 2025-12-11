@extends('layouts.app')

@section('content')

<style>
        
     body {
        background-color: #e0e7ff; /* 背景色：薄い青 */
        color: #7192ff;           /* 文字色：濃いグレー */
        
          }
            /* 全ゲームタイトルをオレンジに */
             .site-title {
              color: orange;
              font-weight: 700;  
          }  
             .introduction-text {
              color: #6C27F5; /* 紫色 */
              font-weight: bold;
          
          }
  
</style>
<div class="container my-4">
  <div class="row">
    <div class="col-10 offset-1">
      <div class="card">
        <div class="card-header">
          <h5 class="m-0 site-title">{{ $game->site }}</h5>
        </div>
        <div class="card-body">
          @if($game->image)
            <img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" class="game-image" loading="lazy">
          @endif

          @if($game->introduction)
            <p class="mb-3 introduction-text">{{ $game->introduction }}</p>
          @endif

          @if($game->url)
            <a href="{{ $game->url }}" target="_blank" rel="noopener" class="btn btn-primary">
              公式サイトを開く
            </a>
          @endif

          <a href="{{ route('games.index') }}" class="btn btn-outline-secondary ms-2">一覧に戻る</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
