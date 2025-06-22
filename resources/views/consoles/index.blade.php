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
      <th scope="row"><span style="color: green;">{{ $loop->iteration }}</th>
      <td><span style="color: red;">{{ $console->introduction }}</span></td>
      <td><span style="color: blue;">{{ $console->Manufacturer }}</span></td>
      <td><span style="color: purple;">{{ $console->use }}</span></td>
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