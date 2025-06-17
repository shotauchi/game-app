@extends('layouts.app')

@section('content')
<!-- サイト名 -->
        <div class="text-center my-4">
            <h1>コンソール一覧画面です</h1>
        </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">introduction</th>
      <th scope="col">Manufacturer</th>
      <th scope="col">use</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($consoles as $console)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $console->introduction }}</td>
      <td>{{ $console->Manufacturer }}</td>
      <td>{{ $console->use }}</td>
    </tr>
    @empty
    <tr>
      <th scope="row">-</th>
      <td>コンソールがありません。</td>
      <td>コンソールがありません。</td>
    </tr>
    @endforelse
  </tbody>
</table>
        
@endsection