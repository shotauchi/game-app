@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #75FF75;
        color: #7192ff;
    }
</style>

<!-- サイト名 -->
<div class="text-center my-4">
    <h1>ゲーム情報サイト</h1>
</div>

<div class="container">
    <!-- ジャンル検索 -->
    <!--<div class="row mb-4">-->
    <!--    <div class="col-8 offset-2">-->
    <!--        <div class="card">-->
    <!--            <div class="card-header bg-danger d-flex justify-content-between align-items-center">-->
    <!--                <span class="text-white fw-bold">ジャンル検索</span>-->
    <!--                <form class="d-flex" role="search">-->
    <!--                    <input class="form-control me-2" type="search" placeholder="検索" aria-label="Search">-->
    <!--                    <button class="btn btn-warning" type="submit">Search</button>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--            <div class="card-body">-->
    <!--                <ul class="list-group">-->
    <!--                    @foreach($games2 as $game)-->
    <!--                        <li class="list-group-item list-group-item-info mb-2">{{ $game->introduction }}</li>-->
    <!--                    @endforeach-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- ゲームタイトル検索 -->
    <div class="row mb-4">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                    <span class="text-white fw-bold">ゲームタイトル検索</span>
                    <div class="form-floating me-3" style="min-width:180px;">
                    </div>
                    <form class="d-flex" role="search" method="GET" action="{{ route('games.search') }}">
                        <div class="form-floating me-3" style="min-width:180px;">
                            <select class="form-select" id="searchMode" name="mode">
                                <option value="game_title" {{ request('mode') === 'game_title' ? 'selected' : '' }}>タイトル</option>
                                <option value="introduction" {{ request('mode') === 'introduction' ? 'selected' : '' }}>ジャンル</option>
                            </select>
                            <label for="searchMode">検索対象</label>
                        </div>
                        <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}" placeholder="検索" aria-label="Search">
                        <button class="btn btn-warning" type="submit">Search</button>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($games1 as $game)
                            <a href="{{ route('games.show', $game) }}"
                               class="list-group-item list-group-item-action list-group-item-info">
                                タイトル：{{ $game->site }}　
                                ジャンル：{{ $game->introduction }}
                            </a>
                        @empty
                            <li class="list-group-item list-group-item-danger">
                                該当のタイトル、ジャンルがありません
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- コンソール検索 -->
<div class="row mb-4">
  <div class="col-8 offset-2">
    <div class="card">
      <div class="card-header bg-warning d-flex justify-content-between align-items-center">
        <span class="text-white fw-bold">コンソール検索</span>

        <form class="d-flex" role="search" method="GET" action="{{ route('home') }}">
          <div class="form-floating me-2" style="min-width:180px;">
            <select class="form-select" id="console_mode" name="console_mode">
              <option value="name" {{ request('console_mode') === 'name' ? 'selected' : '' }}>名前</option>
              <option value="manufacturer" {{ request('console_mode') === 'manufacturer' ? 'selected' : '' }}>メーカー</option>
            </select>
            <label for="console_mode">検索対象</label>
          </div>

          <input class="form-control me-2" type="search" name="console_search" value="{{ request('console_search') }}" placeholder="検索" aria-label="Search">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>

      <div class="card-body">
        <div class="list-group">
          @forelse($consoles as $console)
            <a href="{{ route('consoles.show', $console) }}" 
               class="list-group-item list-group-item-action list-group-item-info">
              {{ $console->name }}
            </a>
          @empty
            <div class="list-group-item list-group-item-danger">該当のコンソールがありません</div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- パフォーマンス検索 -->
    <!-- パフォーマンス検索 -->
<div class="row mb-4">
  <div class="col-8 offset-2">
    <div class="card">
      <div class="card-header bg-success d-flex justify-content-between align-items-center">
        <span class="text-white fw-bold">パフォーマンス検索</span>

        <form class="d-flex" role="search" method="GET" action="{{ route('home') }}">
          <div class="form-floating me-2" style="min-width:180px;">
            <select class="form-select" id="performance_mode" name="performance_mode">
              <option value="CPU" {{ request('performance_mode') === 'CPU' ? 'selected' : '' }}>CPU</option>
              <option value="GPU" {{ request('performance_mode') === 'GPU' ? 'selected' : '' }}>GPU</option>
              <!-- 実際の DB カラムが違う場合はここを修正 -->
            </select>
            <label for="performance_mode">検索対象</label>
          </div>

          <input class="form-control me-2" type="search" name="performance_search" value="{{ request('performance_search') }}" placeholder="検索" aria-label="Search">
          <button class="btn btn-warning" type="submit">Search</button>
        </form>
      </div>

      <div class="card-body">
        <div class="list-group">
          @forelse($performances as $performance)
            <a href="{{ route('performances.show', $performance) }}" class="list-group-item list-group-item-action list-group-item-info">
              {{ $performance->CPU }}
            </a>
          @empty
            <div class="list-group-item list-group-item-danger">該当のパフォーマンスがありません</div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>


    <!-- サイト案内 -->
    <!--<div class="row mb-4">-->
    <!--    <div class="col-8 offset-2">-->
    <!--        <div class="card">-->
    <!--            <div class="card-body">-->
    <!--                <h5 class="card-title text-center">サイト案内</h5>-->
    <!--                <ul class="list-group list-group-numbered list-group-flush">-->
    <!--                    <li class="list-group-item bg-primary text-white">-->
    <!--                        <a href="{{ route('games.index') }}" class="text-white text-decoration-none">ゲーム一覧ページ</a>-->
    <!--                    </li>-->
    <!--                    <li class="list-group-item bg-warning text-white">-->
    <!--                        <a href="{{ route('consoles.index') }}" class="text-white text-decoration-none">コンソール一覧ページ</a>-->
    <!--                    </li>-->
    <!--                    <li class="list-group-item bg-success text-white">-->
    <!--                        <a href="{{ route('performances.index') }}" class="text-white text-decoration-none">パフォーマンス一覧ページ</a>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</div>

<!-- 最下部に追加 -->
<footer class="text-center py-3 mt-4">
    <small>
        最終更新日：
        @if(!empty($lastUpdated))
            {{ \Carbon\Carbon::parse($lastUpdated)->format('Y年n月j日 H:i') }}
        @else
            {{ \Carbon\Carbon::now()->timezone(config('app.timezone','Asia/Tokyo'))->format('Y年n月j日') }}
        @endif
    </small>
</footer>

@endsection
