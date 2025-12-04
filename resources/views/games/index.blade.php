@extends('layouts.app')

@section('content')
<!-- サイト名 -->

<style>
    body {
        background-color: #e0e7ff; /* 背景色：薄い青 */
        color: #7192ff;           /* 文字色：濃いグレー */
    .th-image { color: #0d6efd; }
    .th-site  { color: orange; }     /* site は縦の文字と同じオレンジ */
    .th-introduction { color: purple; }       /* introduction は紫 */
    .th-url   { color: red; }          /* URL は赤 */
    .th-delete, .th-edit { color: #0d6efd; }
    
         }

</style>

<div class="text-center my-4">
    <h1>ゲーム一覧画面</h1>
</div>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" class="th-image"><span class="material-symbols-outlined fs-6">imagesmode</span>image</th>
            <th scope="col" class="th-site"><span class="material-symbols-outlined fs-6">account_tree</span>site</th>
            <th scope="col" class="th-introduction"><span class="material-symbols-outlined fs-6">page_footer</span>introduction</th>
            <th scope="col" class="th-url"><span class="material-symbols-outlined fs-6">qr_code_scanner</span>URL</th>

            {{-- 管理者のみヘッダを表示（セッションベースで統一） --}}
            @if(session()->has('is_admin') && session('is_admin'))
              <th scope="col" class="th-delete"><span class="material-symbols-outlined fs-6">delete</span>delete</th>
              <th scope="col" class="th-edit"><span class="material-symbols-outlined fs-6">contract_edit</span>edit</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @forelse ($games as $game)
          <tr>
            <th scope="row"><span style="color: green;">{{ $loop->iteration }}</span></th>

            <td>
                @if ($game->image)
                    <img src="{{ $game->thumbnail_url }}" alt="Game Image" width="100">
                @else
                    <span>画像なし</span>
                @endif
            </td>

            <td><span style="color: orange;">{{ $game->site }}</span></td>
            <td><span style="color: purple;">{{ $game->introduction }}</span></td>
            <td>
              @if($game->url)
                <a href="{{ $game->url }}" target="_blank" rel="noopener noreferrer" style="color: red;">
                  {{ $game->url }}
                </a>
              @else
                <span style="color: red;">URLなし</span>
              @endif
            </td>
            
            {{-- 管理者のみ操作カラムを出す --}}
            @if(session()->has('is_admin') && session('is_admin'))
              <td>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('本当に削除してよろしいですか？');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-info">delete</button>
                </form>
              </td>
              <td>
                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-info">edit</a>
              </td>
            @endif

          </tr>
          @empty
          <tr>
            <th scope="row">-</th>
            <td>ゲーム画像がありません。</td>
            <td>ゲームサイトがありません。</td>
            <td>ゲーム紹介がありません。</td>
            <td>ゲームURLがありません。</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection