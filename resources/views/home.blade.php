@extends('layouts.app')

@section('content')
<!-- サイト名 -->
        <div class="text-center my-4">
            <h1>サイト名</h1>
        </div>
        
        <!-- パネル3つ -->
        <div class="container">
            <div class="row mb-4">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-header bg-success d-flex justify-content-between align-items-center">
                            <span class="text-white fw-bold">ジャンル検索</span>
                            <form class="d-flex" role="search">
                              <input class="form-control me-2" type="search" placeholder="検索" aria-label="Search">
                              <button class="btn btn-light" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">フィルターで抽出したゲーム1</li>
                                <li class="list-group-item">フィルターで抽出したゲーム2</li>
                                <li class="list-group-item">フィルターで抽出したゲーム3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                            <span class="text-white fw-bold">ゲームタイトル検索</span>
                            <form class="d-flex" role="search">
                              <input class="form-control me-2" type="search" placeholder="検索" aria-label="Search">
                              <button class="btn btn-light" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">タイトル検索でヒットしたゲーム1</li>
                                <li class="list-group-item">タイトル検索でヒットしたゲーム2</li>
                                <li class="list-group-item">タイトル検索でヒットしたゲーム3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title text-center">サイト案内</h5>
                          <ul class="list-group list-group-numbered list-group-flush">
                            <li class="list-group-item">ゲーム一覧ページ</li>
                            <li class="list-group-item">コンソール一覧ページ</li>
                            <li class="list-group-item">パフォーマンス一覧ページ</li>
                          </ul>
                        </div>
                      </div>
                </div>
            </div>
        </div>
@endsection
