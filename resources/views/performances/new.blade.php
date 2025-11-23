@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #b4ffb2; /* 背景色：薄い緑 */
        color: #28a745;           /* 文字色：濃いグレー */
    }
    
</style>

<div class="container card py-5 px-3 mt-5">
    <h2 style="color: #006400;">パフォーマンスの新規作成</h2> <!-- 濃い緑 -->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form method="POST" action="{{ route('performances.store') }}">
        @csrf

        @foreach($consoles as $console)
          <div class="form-check">
            <input class="form-check-input single-checkbox"
                   type="radio"
                   name="console_id"
                   id="console{{ $console->id }}"
                   value="{{ $console->id }}">
            <label class="form-check-label" for="console{{ $console->id }}">
              {{ $console->use }} 
            </label>
          </div>
        @endforeach
        @error('console_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="CPU" class="form-label" style="color: #2C90F5;"><span class="material-symbols-outlined fs-6">developer_board</span>CPU</label> <!-- 濃いオレンジ -->
            <div class="col-3">
                <input type="text" name="CPU" id="CPU" class="form-control @error('CPU') is-invalid @enderror" value="{{ old('CPU') }}">
            </div>
            @error('CPU')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="GPU" class="form-label" style="color: #7927F5;"><span class="material-symbols-outlined fs-6">memory</span>GPU</label> <!-- 濃い黄色 -->
            <div class="col-3">
                <input type="text" name="GPU" id="GPU" class="form-control @error('GPU') is-invalid @enderror" value="{{ old('GPU') }}">
            </div>
            @error('GPU')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 </div>
    <!-- ① 新規作成フォームの後に追加 -->
    <div class="text-end mt-3 me-3">
        <a href="{{ route('performances.index') }}" class="btn btn-outline-success">
            <span class="material-symbols-outlined fs-6">select_all</span>パフォーマンス一覧画面へ
        </a>
    </div>
        
@endsection
