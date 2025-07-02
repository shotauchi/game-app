@extends('layouts.app')

@section('content')
<!-- サイト名 -->
        <div class="text-center my-4">
            <h1>ゲーム一覧画面です</h1>
        </div>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th scope="col">image</th>
            <th scope="col">URL</th>
            <th scope="col">site</th>
          </tr>
        </thead>
        
        <ul>
    @forelse ($games as $game)
        <li>{{ $game->title }}</li>
    @empty
        <li>ゲームがありません。</li>
    @endforelse
</ul>
        
        
@endsection
