@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #ffe88b;
    　　color: #ff9b00;
    }
    
</style>

<div class="container mt-5">
  <div class="card py-5 shadow-lg px-3">
    <h2 style="color: #ff8c00;">コンソール新規作成</h2> <!-- 濃いオレンジ -->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('consoles.store') }}" method="POST">
        @csrf

        
        <div class="mb-3">
            <label for="introduction" class="form-label" style="color: #F52C2C;"><span class="material-symbols-outlined fs-6">computer</span>introduction</label> <!-- 濃い紫 -->
            <div class="col-3">
            <textarea name="introduction" id="introduction" class="form-control @error('introduction') is-invalid @enderror">{{ old('introduction') }}</textarea>
            @error('introduction')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="Manufacturer" class="form-label" style="color: #2C90F5;"><span class="material-symbols-outlined fs-6">headset_mic</span>Manufacturer</label> <!-- 濃い緑 -->
            <div class="col-3">
            <input type="text" name="Manufacturer" id="Manufacturer" class="form-control @error('Manufacturer') is-invalid @enderror" value="{{ old('Manufacturer') }}">
            @error('Manufacturer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="name" class="form-label" style="color: #43F52C;"><span class="material-symbols-outlined fs-6">cable</span>name</label>
            <div class="col-3">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 mt-4">
            <label for="use" class="form-label" style="color: #7927F5;"><span class="material-symbols-outlined fs-6">mouse</span>use</label> <!-- 濃い黄色 -->
            <div class="col-3">
            <input type="text" name="use" id="use" class="form-control @error('use') is-invalid @enderror" value="{{ old('use') }}">
            @error('use')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-4">登録する</button>
    </form>
  </div> {{-- card --}}
</div>{{-- container --}}
<!-- ① 新規作成フォームの後に追加 -->
<div class="text-end mt-4 me-3">
    <a href="{{ route('consoles.index') }}" class="btn btn-outline-warning">
        <span class="material-symbols-outlined fs-6">keyboard</span>コンソール一覧画面へ
    </a>
</div>
        
@endsection
