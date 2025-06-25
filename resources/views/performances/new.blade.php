@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #f0f8ff; /* 背景色：薄い青 */
        color: #28a745;           /* 文字色：濃いグレー */
    }
    
</style>

<div class="container mt-5">
    <h2 style="color: #006400;">パフォーマンスの新規作成</h2> <!-- 濃い緑 -->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form  method="POST">
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
            <label for="GPU" class="form-label" style="color: #ff8c00;">GPU</label> <!-- 濃いオレンジ -->
            <div class="col-3">
                <input type="text" name="GPU" id="GPU" class="form-control @error('GPU') is-invalid @enderror" value="{{ old('GPU') }}">
            </div>
            @error('GPU')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="CPU" class="form-label" style="color: #b8860b;">CPU</label> <!-- 濃い黄色 -->
            <div class="col-3">
                <input type="text" name="CPU" id="CPU" class="form-control @error('CPU') is-invalid @enderror" value="{{ old('CPU') }}">
            </div>
            @error('CPU')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

        
        
        
@endsection
