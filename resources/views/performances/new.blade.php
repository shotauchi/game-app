@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<div class="container mt-5">
    <h2>Create New Console</h2>

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
            <label for="Manufacturer" class="form-label">GPU</label>
            <input type="text" name="Manufacturer" id="Manufacturer" class="form-control @error('Manufacturer') is-invalid @enderror" value="{{ old('Manufacturer') }}">
            @error('Manufacturer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="use" class="form-label">CPU</label>
            <input type="text" name="use" id="use" class="form-control @error('use') is-invalid @enderror" value="{{ old('use') }}">
            @error('use')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

        
        
        
@endsection
