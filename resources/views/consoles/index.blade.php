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
        
<!--<div class="container-sm bg-danger">100% wide until small breakpoint</div>-->
<!--<div class="container-md bg-warning">100% wide until medium breakpoint</div>-->
<!--<div class="container-lg bg-danger">100% wide until large breakpoint</div>-->
<!--<div class="container-xl bg-warning">100% wide until extra large breakpoint</div>-->
<!--<div class="container-xxl bg-danger">100% wide until extra extra large breakpoint</div>      -->
        
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <table class="table table-bordered table-striped text-center">
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
 </div>
</div>

@endsection
