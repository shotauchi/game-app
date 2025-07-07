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
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">URL</th>
            <th scope="col">site</th>
            <th scope="col">introduction</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($games as $game)
          <tr>
            <th scope="row"><span style="color: green;">{{ $loop->iteration }}</th>
            <td><span style="color: blue;">{{ $game->image }}</td>
            <td><span style="color: red;">{{ $game->URL }}</td>
            <td><span style="color: orange;">{{ $game->site }}</td>
            <td><span style="color: purple;">{{ $game->introduction }}</td>
          </tr>
          @empty
          <tr>
            <th scope="row">-</th>
            <td>ゲームがありません。</td>
            <td>ゲームがありません。</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
        
        
@endsection
