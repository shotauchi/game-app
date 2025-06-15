@extends('layouts.app')

@section('content')

<style>
        
        body {
        background-color: #f0f8ff; /* 背景色：薄い青 */
        color: #28a745;           /* 文字色：濃いグレー */
    }
    
</style>

<div class="container" style="max-width: 400px;">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">管理者ログイン</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="password" class="form-label">パスワード</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
        
@endsection
