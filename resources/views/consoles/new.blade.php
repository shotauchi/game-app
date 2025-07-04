@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #f0f8ff; /* 背景色：薄い青色
    }
    
</style>

<div class="container card py-5 px-3 mt-5">
    <h2 style="color: #ff8c00;">コンソールの新規作成</h2> <!-- 濃いオレンジ -->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
<a href="/">
  <div style="position: fixed; bottom: 20px; right: 20px; background-color: gold; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-weight: bold;">
    戻る
  </div>
</a>

    <form action="{{ route('consoles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="introduction" class="form-label" style="color: #800080;">Introduction</label> <!-- 濃い紫 -->
            <div class="col-3">
            <textarea name="introduction" id="introduction" class="form-control @error('introduction') is-invalid @enderror">{{ old('introduction') }}</textarea>
            @error('introduction')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Manufacturer" class="form-label" style="color: #006400;">Manifacture</label> <!-- 濃い緑 -->
            <div class="col-3">
            <input type="text" name="Manufacturer" id="Manufacturer" class="form-control @error('Manufacturer') is-invalid @enderror" value="{{ old('Manufacturer') }}">
            @error('Manufacturer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="use" class="form-label" style="color: #b8860b;">Use</label> <!-- 濃い黄色 -->
            <div class="col-3">
            <input type="text" name="use" id="use" class="form-control @error('use') is-invalid @enderror" value="{{ old('use') }}">
            @error('use')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

        
        
        
@endsection
