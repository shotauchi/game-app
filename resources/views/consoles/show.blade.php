@extends('layouts.app')

@section('content')

<style>
  body {
    background-color: #ffe88b; /* 背景色：薄い黄 */
    color: #7192ff;           /* 文字色 */
    
    .title-green { color: green; }       /* タイトル（名前） */
    .maker-blue { color: blue; }         /* メーカー */
    .introduction-red { color: red; }           /* 紹介 */
    .use-purple { color: purple; }       /* 用途 */
  
       }
  
</style>

<div class="container my-4">
  <div class="row">
    <div class="col-10 offset-1">
      <div class="card">
        <div class="card-header">
          <h5 class="m-0 title-green">{{ $console->name }}</h5>
        </div>
        <div class="card-body">
          @if($console->Manufacturer)
            <p><strong class="maker-blue">メーカー:</strong> {{ $console->Manufacturer }}</p>
          @endif

          @if($console->introduction)
            <p><strong class="introduction-red">紹介:</strong> {{ $console->introduction }}</p>
          @endif

          @if($console->use)
            <p><strong class="use-purple">用途:</strong> {{ $console->use }}</p>
          @endif

          <a href="{{ route('consoles.index') }}" class="btn btn-outline-secondary mt-3">一覧に戻る</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
