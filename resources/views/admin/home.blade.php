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
 <h1>管理者画面</h1>
</div>
<!-- 変更後 -->
<div class="d-flex justify-content-center gap-3 my-4">
    <div class="d-flex justify-content-center gap-3 my-4">
    <a href="{{ route('games.index') }}" class="btn btn-sm btn-outline-primary">ゲーム一覧</a>
    <a href="{{ route('consoles.index') }}" class="btn btn-sm btn-outline-warning">コンソール一覧</a>
    <a href="{{ route('performances.index') }}" class="btn btn-sm btn-outline-success">パフォーマンス一覧</a>
    </div>
</div>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="d-flex flex-column gap-3 text-center">
     <span class="material-icons">account_circle</span>   
         <a href="{{ route('games.create') }}" class="btn btn-primary">
        新しいゲームを作成
        </a>
        
        <a href="{{ route('consoles.create') }}" class="btn btn-warning">
        新しいコンソールを作成
        </a>
        
        <a href="{{ route('performances.create') }}" class="btn btn-success">
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
