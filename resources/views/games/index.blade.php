@extends('layouts.app')

@section('content')
<!-- サイト名 -->

<style>
        
        body {
        background-color: #e0e7ff; /* 背景色：薄い青 */
        color: #7192ff;           /* 文字色：濃いグレー */
        
    }
    
</style>

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
            <th scope="col">site</th>
            <th scope="col">introduction</th>
            <th scope="col">URL</th>
            <th scope="col">delete</th>
            <th scope="col">edit</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($games as $game)
          <tr>
            <th scope="row"><span style="color: green;">{{ $loop->iteration }}</th>
            <td><span style="color: blue;">{{ $game->image }}</span></td>
            <td><span style="color: orange;">{{ $game->site }}</span></td>
            <td><span style="color: purple;">{{ $game->introduction }}</span></td>
            <td><span style="color: red;">{{ $game->URL }}</span></td>
            <td>
              <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('本当に削除してよろしいですか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-info">delete</button>
              </form>
            </td>
            <td>
              <form action="{{ route('games.edit', $game->id) }}" method="POST" onsubmit="return confirm('本当に編集してよろしいですか？');">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-info">edit</button>
              </form>
            </td>
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
