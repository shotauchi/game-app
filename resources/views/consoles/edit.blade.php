@extends('layouts.app')

@section('content')
<div class="text-center my-5">
    <h1>編集画面一覧です。</h1>
    
    <!-- 編集フォーム -->
    <form action="{{ route('consoles.update', $console->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- PUTメソッドに変換（更新処理） -->

        <div class="mb-3">
            <label for="use" class="form-label">コンソール名</label>
            <input type="text" name="use" id="use" class="form-control" value="{{ old('use', $console->use) }}" required>
        </div>

        <div class="mb-3">
            <label for="introduction" class="form-label">紹介文</label>
            <textarea name="introduction" id="introduction" class="form-control" rows="5" required>{{ old('introduction', $console->introduction) }}</textarea>
        </div>
        
        <div class="mb-3">
        <label for="Manufacturer" class="form-label">メーカー名</label>
        <input type="text" name="Manufacturer" id="Manufacturer" class="form-control"
           value="{{ old('Manufacturer', $console->Manufacturer) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">更新する</button>
    </form>
</div>
@endsection
