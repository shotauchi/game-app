@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<div class="container mt-5">
    <h2>パフォーマンスの新規作成</h2>

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
            <label for="GPU" class="form-label">GPU</label>
            <input type="text" name="GPU" id="GPU" class="form-control @error('GPU') is-invalid @enderror" value="{{ old('GPU') }}">
            @error('GPU')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="CPU" class="form-label">CPU</label>
            <input type="text" name="CPU" id="CPU" class="form-control @error('CPU') is-invalid @enderror" value="{{ old('CPU') }}">
            @error('CPU')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

        
        
        
@endsection
