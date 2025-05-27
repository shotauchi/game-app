@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<div class="container mt-5">
    <h2>Create New Console</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form action="" method="POST">
        @csrf

        <div class="mb-3">
            <label for="introduction" class="form-label">Introduction</label>
            <textarea name="introduction" id="introduction" class="form-control @error('introduction') is-invalid @enderror">{{ old('introduction') }}</textarea>
            @error('introduction')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="manifacture" class="form-label">Manifacture</label>
            <input type="text" name="manifacture" id="manifacture" class="form-control @error('manifacture') is-invalid @enderror" value="{{ old('manifacture') }}">
            @error('manifacture')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="use" class="form-label">Use</label>
            <input type="text" name="use" id="use" class="form-control @error('use') is-invalid @enderror" value="{{ old('use') }}">
            @error('use')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

        
        
        
@endsection
