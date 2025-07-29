@extends('layouts.app')

@section('content')

<style>
        
        body {
        background-color: #b4ffb2; /* 背景色：薄い緑 */
        color: #28a745;           /* 文字色：濃いグレー */
    }
    
</style>

<div class="text-center my-5">
    <h1>編集画面一覧です。</h1>
    
    <!-- 編集フォーム -->
    <form action="{{ route('performances.update', $performance->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- PUTメソッドに変換（更新処理） -->

        <div class="mb-3">
            <label for="CPU" class="form-label">CPU</label>
            <input type="text" name="CPU" id="CPU" class="form-control" value="{{ old('CPU', $performance->CPU) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="GPU" class="form-label">GPU</label>
            <input type="text" name="GPU" id="GPU" class="form-control" value="{{ old('GPU', $performance->GPU) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
</div>
@endsection
