@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #b4ffb2; /* 背景色：薄い青 */
        color: #28a745;           /* 文字色：濃いグレー */
        
    }
    
</style>

        <div class="text-center my-4">
            <h1>パフォーマンス一覧画面です</h1>
        </div>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">CPU</th>
            <th scope="col">GPU</th>
            <th scope="col">delete</th>
            <th scope="col">edit</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($performances as $performance)
          <tr>
            <th scope="row"><span style="color: green;">{{ $loop->iteration }}</th>
            <td><span style="color: blue;">{{ $performance->CPU }}</span></td>
            <td><span style="color: purple;">{{ $performance->GPU }}</span></td>
            <td><form action="{{ route('performances.destroy', $performance->id) }}" method="POST" onsubmit="return confirm('本当に削除してよろしいですか？');">
            @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-success">delete</button>
        　　　　　　</form>
        　　　</td>
        　　<td>
                <form action="{{ route('performances.edit', $performance->id) }}" method="POST" onsubmit="return confirm('本当に編集してよろしいですか？');">
                      @csrf
                      @method('POST')
                      <button type="submit" class="btn btn-info">edit</button>
                </form>
            </td>
          </tr>
          @empty
          <tr>
            <th scope="row">-</th>
            <td>パフォーマンスがありません。</td>
            <td>パフォーマンスがありません。</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection