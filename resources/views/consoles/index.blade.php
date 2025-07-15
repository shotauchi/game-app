@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
        body {
        background-color: #ffe88b; 
        color: #ff9b00;           /* 文字色：濃いグレー */
        
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
      <th scope="col">delete</th>
      <th scope="col">edit</th>
      
    </tr>
  </thead>
  <tbody>
    @forelse ($consoles as $console)
    <tr>
      <td scope="row"><span style="color: green;">{{ $loop->iteration }}</td>
      <td><span style="color: red;">{{ $console->introduction }}</span></td>
      <td><span style="color: blue;">{{ $console->Manufacturer }}</span></td>
      <td><span style="color: purple;">{{ $console->use }}</span></td>
      <td><form action="{{ route('consoles.destroy', $console->id) }}" method="POST" onsubmit="return confirm('本当に削除してよろしいですか？');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-warning">delete</button>
          </form>
      </td>
      <td>
          <form action="{{ route('consoles.edit', $console->id) }}" method="POST" onsubmit="return confirm('本当に編集してよろしいですか？');">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-info">edit</button>
          </form>
      </td>
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
