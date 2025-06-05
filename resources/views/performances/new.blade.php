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

        <div class="mb-3">
      <div class="form-check">
        <input class="form-check-input single-checkbox" type="checkbox" id="console1">
        <label class="form-check-label" for="console1">コンソール1</label>
      </div>
      <div class="form-check">
        <input class="form-check-input single-checkbox" type="checkbox" id="console2">
        <label class="form-check-label" for="console2">コンソール2</label>
      </div>
      <div class="form-check">
        <input class="form-check-input single-checkbox" type="checkbox" id="console3">
       <label class="form-check-label" for="console3">コンソール3</label>
      </div>
            @error('introduction')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

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
