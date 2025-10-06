<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @stack('styles')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <!-- Google font Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!--一旦cdnでブートストラップを読み込む-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
  body {
    padding-top: 60px;
    padding-bottom: 60px; /* 修正: bottom の綴り */
    background-color: #75FF75; /* 全ページ共通背景 */
    color: #7192ff;           /* 全ページ共通文字色 */
  }

  /* トグル（上の「Dropdown」テキスト）を紫に */
  .navbar .nav-link.dropdown-toggle {
    color: purple !important;
  }

  /* offcanvas（右側パネル）内のドロップダウンメニュー項目だけを紫に */
  .offcanvas .dropdown-menu .dropdown-item {
    color: purple !important;
  }

  /* hover / focus の色 */
  .offcanvas .dropdown-menu .dropdown-item:hover,
  .offcanvas .dropdown-menu .dropdown-item:focus {
    color: #6F27F5 !important;
    background-color: #f8f9fa; /* 必要なら有効化 */
  }

  /* active / :active の色 */
  .offcanvas .dropdown-menu .dropdown-item.active,
  .offcanvas .dropdown-menu .dropdown-item:active {
    color: #6F27F5 !important;
    background-color: #e9ecef;
  }

  /* 無効(disabled)項目の見た目 */
  .offcanvas .dropdown-menu .dropdown-item.disabled,
  .offcanvas .dropdown-menu .dropdown-item:disabled {
    color: #adb5bd !important;
    pointer-events: none;
  }
</style>
</head>
<body class="d-flex flex-column justify-content-between min-vh-100 @yield('body-class')">
    <div id="app">
    <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                ロゴ
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #1e3a8a;">
              <span class="material-symbols-outlined fs-5">account_box</span> メニュー覧
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              {{-- ここで部分テンプレートを読み込む --}}
              @include('partials.site-guide-navbar')
              <!--<li class="nav-item">-->
              <!--  <a class="nav-link active" aria-current="page" href="#"><span class="material-symbols-outlined fs-6">home</span>Home</a>-->
              <!--</li>-->
              <!--<li class="nav-item">-->
              <!--  <a class="nav-link" href="#"><span class="material-symbols-outlined fs-6">link</span>Link</a>-->
              <!--</li>-->
              @php $rec = config('recommended_sites'); @endphp

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                メーカー別オススメコンソールorサイト紹介サイト一覧
              </a>
              <ul class="dropdown-menu">
                @foreach($rec['consoles'] as $site)
                  <li>
                    <a class="dropdown-item" href="{{ $site['url'] }}" target="_blank" rel="noopener noreferrer">
                      {{ $site['name'] }}
                    </a>
                  </li>
                @endforeach
            
                <li><hr class="dropdown-divider"></li>
            
                @foreach($rec['sites'] as $site)
                  <li>
                    <a class="dropdown-item" href="{{ $site['url'] }}" target="_blank" rel="noopener noreferrer">
                      {{ $site['name'] }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>
            </ul>
            <!--<form class="d-flex mt-3" role="search">-->
            <!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
            <!--  <button class="btn btn-outline-success" type="submit">Search</button>-->
            <!--</form>-->
          </div>
              <li class="nav-item">
                <a href="{{ route('home') }}"
                   class="nav-link p-2 rounded d-flex align-items-center {{ request()->routeIs('home') ? 'bg-white text-info fw-bold' : 'text-secondary' }}"
                   aria-current="{{ request()->routeIs('home') ? 'page' : '' }}"
                   title="ホームへ戻る">
                    <span class="material-symbols-outlined align-middle fs-6">home</span>
                    <span class="align-middle ms-1">ホームへ戻る</span>
                </a>
        　　　　</li>
        </div>
      </div>
    </nav>
        
    <main class="py-4 flex-grow-1 min-vh-100">
        @yield('content')
    </main>
     {{-- フッター --}}
@unless (request()->routeIs('home'))
<footer class="bg-white mt-auto py-4 px-3 d-flex justify-content-end">
    <a href="{{ route('home') }}">
      <div style="position: fixed; bottom: 20px; right: 20px; background-color: gold; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-weight: bold;">
        <span class="material-symbols-outlined fs-6">subdirectory_arrow_left</span>戻る
      </div>
    </a>
</footer>
@endunless

</body>
</html>
