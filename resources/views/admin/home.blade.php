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

<!-- サイト名 -->
<div class="text-center my-4">
 <h1>管理者画面です!!</h1>
</div>
<div class="d-flex justify-content-center vh-100">
    <div class="d-flex flex-column gap-3 text-center">
        
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
