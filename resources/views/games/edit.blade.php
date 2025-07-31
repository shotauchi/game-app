@extends('layouts.app')

@section('content')

<style>
        
        body {
        background-color: #e0e7ff; /* 背景色：薄い青 */
        color: #7192ff;           /* 文字色：濃いグレー */
        
    }
    
</style>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- 幅を短めに（12分割のうち6列分） -->
            <h1 class="text-center mb-4">編集画面一覧です。</h1>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('games.update', $game->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="image" class="form-label">画像</label>
                            <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $game->image) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $game->url) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="site" class="form-label">サイト名</label>
                            <input type="text" name="site" id="site" class="form-control" value="{{ old('site', $game->site) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="introduction" class="form-label">紹介文</label>
                            <textarea name="introduction" id="introduction" class="form-control" rows="5" required>{{ old('introduction', $game->introduction) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">更新する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection
