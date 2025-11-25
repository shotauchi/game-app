@extends('layouts.app')

@section('content')

<style>
  body {
    background-color: #b4ffb2;
    color: #7192ff;
    
    .title-green { color: green; }       /* タイトル（名前） */
    .CPU-blue { color: blue; }
    .GPU-purple { color: purple; }
    
       }
</style>

<div class="container my-4">
  <div class="row">
    <div class="col-10 offset-1">
      <div class="card">
        <div class="card-header">
          <h5 class="m-0 title-green">性能情報</h5>
        </div>
        <div class="card-body">
          @if($performance->CPU)
            <p><strong class="CPU-blue">CPU:</strong> {{ $performance->CPU }}</p>
          @endif

          @if($performance->GPU)
            <p><strong class="GPU-purple">GPU:</strong> {{ $performance->GPU }}</p>
          @endif

          @if($performance->url)
            <a href="{{ $performance->url }}" target="_blank" rel="noopener" class="btn btn-primary">
              公式サイトを開く
            </a>
          @endif

          <a href="{{ route('performances.index') }}" class="btn btn-outline-secondary ms-2">一覧に戻る</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
