@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #f0f8ff; /* 背景色：薄い青 */
        color: #28a745;           /* 文字色：濃いグレー */
        
    }
    
</style>

        <div class="text-center my-4">
            <h1>パフォーマンス一覧画面です</h1>
        </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CPU</th>
      <th scope="col">GPU</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($performances as $performance)
    <tr>
      <th scope="row"><span style="color: green;">{{ $loop->iteration }}</th>
      <td><span style="color: blue;">{{ $performance->CPU }}</td>
      <td><span style="color: purple;">{{ $performance->GPU }}</td>
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

@endsection