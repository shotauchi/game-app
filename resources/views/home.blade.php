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
    <h1>サイト名</h1>
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
                    <form class="d-flex" role="search">
                        <div class="form-floating me-3" style="min-width:180px;">
                            <select class="form-select" id="searchMode" name="mode">
                                <option value="game_title" {{ request('mode') === 'game_title' ? 'selected' : '' }}>タイトル</option>
                                <option value="genre" {{ request('mode') === 'genre' ? 'selected' : '' }}>ジャンル</option>
                            </select>
                            <label for="searchMode">検索対象</label>
                        </div>
                        <!-- name="search" を追加。value に request() を入れて検索語を残す -->
                        <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}" placeholder="検索" aria-label="Search">
                        <button class="btn btn-warning" type="submit">Search</button>
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($games1 as $game)
                            <a href="{{ route('games.show', $game) }}"
                               class="list-group-item list-group-item-action list-group-item-info">
                                {{ $game->site }}
                            </a>
                        @endforeach
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
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="検索" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($consoles as $console)
                            <a href=""
                               class="list-group-item list-group-item-action list-group-item-info">
                                {{ $console->introduction }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- パフォーマンス検索 -->
    <div class="row mb-4">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header bg-success d-flex justify-content-between align-items-center">
                    <span class="text-white fw-bold">パフォーマンス検索</span>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="検索" aria-label="Search">
                        <button class="btn btn-warning" type="submit">Search</button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($performances as $performance)
                            <a href=""
                               class="list-group-item list-group-item-action list-group-item-info">
                                {{ $performance->CPU }}
                            </a>
                        @endforeach
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

@endsection
