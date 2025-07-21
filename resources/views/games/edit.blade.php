@extends('layouts.app')

@section('content')
<div class="text-center my-5">
    <h1>編集画面一覧です。</h1>
    
    <!-- 編集フォーム -->
    <form action="{{ route('games.update', $game->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- PUTメソッドに変換（更新処理） -->
    
    <div class="mb-3">
            <label for="image" class="form-label">画像</label>
            <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $game->image) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="URL" class="form-label">URL</label>
            <input type="text" name="URL" id="URL" class="form-control" value="{{ old('URL', $game->URL) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="site" class="form-label">サイト名</label>
            <input type="text" name="site" id="site" class="form-control" value="{{ old('site', $game->site) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="introduction" class="form-label">紹介文</label>
            <textarea name="introduction" id="introduction" class="form-control" rows="5" required>{{ old('introduction', $game->introduction) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
</div>
        
@endsection
