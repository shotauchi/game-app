@extends('layouts.app')

@section('content')
<!-- サイト名 -->
<style>
        
    body {
        background-color: #b4ffb2; /* 背景色：薄い緑 */
        color: #28a745;           /* 文字色：濃いグレー */
      .th-CPU { color: blue; }       
      .th-GPU  { color: purple; }          
      .th-delete { color: #F5A627; } 
      .th-edit { color: #0d6efd;
         
         }
    
</style>

        <div class="text-center my-4">
            <h1>パフォーマンス一覧画面</h1>
        </div>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <table class="table table-bordered table-striped text-center">
        <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col" class="th-CPU"><span class="material-symbols-outlined fs-6">developer_board</span>CPU</th>
    <th scope="col" class="th-GPU"><span class="material-symbols-outlined fs-6">memory</span>GPU</th>
    @if(session()->has('is_admin') && session('is_admin'))
      <th scope="col" class="th-delete"><span class="material-symbols-outlined fs-6">delete</span>delete</th>
      <th scope="col" class="th-edit"><span class="material-symbols-outlined fs-6">contract_edit</span>edit</th>
    @endif
  </tr>
</thead>
<tbody>
  @forelse ($performances as $performance)
  <tr>
    <th scope="row"><span style="color: green;">{{ $loop->iteration }}</span></th>
    <td><span style="color: blue;">{{ $performance->CPU }}</span></td>
    <td><span style="color: purple;">{{ $performance->GPU }}</span></td>

    @if(session()->has('is_admin') && session('is_admin'))
      <td>
        <form action="{{ route('performances.destroy', $performance->id) }}" method="POST" onsubmit="return confirm('本当に削除してよろしいですか？');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-warning">delete</button>
        </form>
      </td>
      <td>
        <a href="{{ route('performances.edit', $performance->id) }}" class="btn btn-info">edit</a>
      </td>
    @endif

  </tr>
  @empty
  <!-- 省略 -->
  @endforelse
</tbody>

      </table>
    </div>
  </div>
</div>

@endsection