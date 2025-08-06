@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #e0e7ff; /* 背景色：薄い青 */
        color: #7192ff;           /* 文字色：濃いグレー */
    }
    
</style>

<div class="container card py-5 px-3 mt-5">
 <h2 style="color: #0000FF;">ゲームの新規作成</h2>

@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form  method="POST">
        @csrf

        @foreach($performances as $performance)
          <div class="form-check">
            <input class="form-check-input single-checkbox"
                   type="radio"
                   name="performance_id"
                   id="performance{{ $performance->id }}"
                   value="{{ $performance->id }}">
            <label class="form-check-label" for="performance{{ $performance->id }}">
              {{ $performance->GPU }} 
            </label>
          </div>
        @endforeach
        @error('performance_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        
            <!-- 画像ファイル選択欄 -->
            <div class="mb-3">
                <label for="image" class="form-label" style="color: #ff8c00;">image</label>
                <div class="col-3">
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                </div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- 他の入力欄（site, URL, introductionなど） -->

        
        <div class="mb-3">
            <label for="site" class="form-label" style="color: #006400;">site</label> <!-- 濃い黄色 -->
            <div class="col-3">
                <input type="text" name="site" id="site" class="form-control @error('site') is-invalid @enderror" value="{{ old('site') }}">
            </div>
            @error('site')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="introduction" class="form-label" style="color: #b8860b;">introduction</label> <!-- 濃い黄色 -->
            <div class="col-3">
                <input type="text" name="introduction" id="introduction" class="form-control @error('introduction') is-invalid @enderror" value="{{ old('introduction') }}">
            </div>
            @error('introduction')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="URL" class="form-label" style="color: #800080;">URL</label> <!-- 濃い黄色 -->
            <div class="col-3">
                <input type="text" name="URL" id="URL" class="form-control @error('URL') is-invalid @enderror" value="{{ old('URL') }}">
            </div>
            @error('URL')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    <!-- ① 新規作成フォームの後に追加 -->
<div class="text-end mt-3 me-3">
    <a href="{{ route('games.index') }}" class="btn btn-outline-primary">
        ゲーム一覧画面へ
    </a>
</div>    
        
@endsection
