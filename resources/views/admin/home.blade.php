@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #fffacd; /* 薄い黄色 */
        color: #28a745;           /* テキスト全体 */
    }

    /* コンテンツ全体の中央寄せ */
    .admin-container {
        max-width: 960px;
        margin: 60px auto;
        text-align: center;
    }

    .admin-container h1 {
        margin-bottom: 30px;
        font-weight: bold;
    }

    /* ボタングリッド */
    .btn-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px 40px; /* 縦20px 横40px */
        justify-items: center;
        margin-bottom: 30px;
    }

    /* 各ボタンを大きめに */
    .btn-grid a {
        min-width: 220px;
        padding: 12px 20px;
        font-weight: 600;
    }

    /* ログアウトボタン */
    .logout-btn {
        min-width: 220px;
    }

    /* レスポンシブ */
    @media (max-width: 768px) {
        .btn-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 480px) {
        .btn-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="admin-container">
    <h1>管理者画面</h1>

    <!-- ボタングリッド -->
<div class="btn-grid">
    <a href="{{ route('games.index') }}" 
       class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center">
        <span class="material-symbols-outlined me-2">stadia_controller</span>
        ゲーム一覧
    </a>
    <a href="{{ route('consoles.index') }}" 
       class="btn btn-warning btn-lg w-100 d-flex align-items-center justify-content-center">
        <span class="material-symbols-outlined me-2">keyboard</span>
        コンソール一覧
    </a>
    <a href="{{ route('performances.index') }}" 
       class="btn btn-success btn-lg w-100 d-flex align-items-center justify-content-center">
        <span class="material-symbols-outlined me-2">select_all</span>
        パフォーマンス一覧
    </a>
    <a href="{{ route('games.create') }}" 
       class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center">
        <span class="material-symbols-outlined me-2">add_circle</span>
        ゲーム新規作成
    </a>
    <a href="{{ route('consoles.create') }}" 
       class="btn btn-warning btn-lg w-100 d-flex align-items-center justify-content-center">
        <span class="material-symbols-outlined me-2">add_circle</span>
        コンソール新規作成
    </a>
    <a href="{{ route('performances.create') }}" 
       class="btn btn-success btn-lg w-100 d-flex align-items-center justify-content-center">
        <span class="material-symbols-outlined me-2">add_circle</span>
        パフォーマンス新規作成
    </a>

    <!-- ログアウトボタンも同じ枠に配置 -->
    <form method="POST" action="{{ route('admin.logout') }}" class="w-100">
        @csrf
        <button type="submit" 
                class="btn btn-outline-danger btn-lg w-100 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined me-2">exit_to_app</span>
            ログアウト
        </button>
    </form>
</div>

@endsection
