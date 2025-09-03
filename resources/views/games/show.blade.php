@extends('layouts.app')

@section('content')
<div class="container my-4">
  <div class="row">
    <div class="col-10 offset-1">
      <div class="card">
        <div class="card-header">
          <h5 class="m-0">{{ $game->site }}</h5>
        </div>
        <div class="card-body">
          @if($game->image)
            <img src="{{ asset('storage/' . $game->image) }}" class="img-fluid mb-3" alt="{{ $game->site }}">
          @endif

          @if($game->introduction)
            <p class="mb-3">{{ $game->introduction }}</p>
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
