@extends('layouts.app')

@section('content')

<!-- スタイルの追加 -->
<style>
        
        body {
        background-color: #fffacd; /* 背景色：薄い黄色 */
        color: #28a745;           /* 文字色：濃いグレー */
    }
        
        
        .logout-button {
        background-color: white;
        border: 2px solid red;
        color: red;
        padding: 8px 16px;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .logout-button:hover {
        background-color: red;
        color: white;
    }
        
</style>

<!-- ヘッダーエリア -->
<nav class="d-flex justify-content-between align-items-center p-3 border-bottom">
    <!-- ロゴ（左側） -->
    <div class="logo">
        <a href="/" class="text-decoration-none text-dark fs-4 fw-bold">Myロゴ</a>
    </div>

    <!-- ナビゲーションバー（右側） -->
    <div class="nav-links d-flex gap-3">
        <a href="{{ route('admin.games.index') }}" class="btn btn-sm btn-outline-primary">ゲーム一覧</a>
        <a href="{{ route('admin.consoles.index') }}" class="btn btn-sm btn-outline-warning">コンソール一覧</a>
        <a href="{{ route('admin.performances.index') }}" class="btn btn-sm btn-outline-success">パフォーマンス一覧</a>
    </div>
</nav>

<!-- サイト名 -->
<div class="text-center my-4">
 <h1>管理者画面です!!</h1>
</div>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="d-flex flex-column gap-3 text-center">
     <span class="material-icons">account_circle</span>   
         <a href="{{ route('admin.games.create') }}" class="btn btn-primary">
        新しいゲームを作成
        </a>
        
        <a href="{{ route('admin.consoles.create') }}" class="btn btn-warning">
        新しいコンソールを作成
        </a>
        
        <a href="{{ route('admin.performances.create') }}" class="btn btn-success">
        新しいパフォーマンスを作成
        </a>
        
        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
            ログアウト
            </button>
        </form>
    </div>    
</div>    
        
@endsection
