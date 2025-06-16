@extends('layouts.app')

@section('content')
<!-- サイト名 -->
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
      <th scope="row">1</th>
      <td>{{ $performance->CPU }}</td>
      <td>{{ $performance->GPU }}</td>
    </tr>
    @empty
    <tr>
      <th scope="row">1</th>
      <td>パフォーマンスがありません。</td>
      <td>パフォーマンスがありません。</td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection