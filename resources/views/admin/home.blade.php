@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<div class="text-center my-4">
 <h1>管理者画面です</h1>
</div>
<a href="{{ route('admin.consoles.create') }}" class="btn btn-primary">
新しいコンソールを作成
</a>
<a href="{{ route('admin.performances.create') }}" class="btn btn-primary">
新しいパフォーマンスを作成
</a>
<form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-outline-secondary btn-sm">
    ログアウト
    </button>
</form>
        
        
        
@endsection
