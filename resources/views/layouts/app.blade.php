<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
    
    <!--一旦cdnでブートストラップを読み込む-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- ナビバー -->
        <nav class="navbar bg-light bg-opacity-25 d-flex justify-content-between px-3">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                    ロゴ
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                    ユーザー
                </div>
            </div>
        </nav>

      <!--      <nav class="navbar bg-body-tertiary fixed-top">-->
      <!--<div class="container-fluid">-->
      <!--  <nav class="navbar bg-light bg-opacity-25 d-flex justify-content-between px-3">-->
      <!--      <div class="d-flex align-items-center">-->
      <!--          <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">-->
      <!--              ロゴ-->
      <!--          </div>-->
      <!--      </div>-->
      <!--  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">-->
      <!--    <span class="navbar-toggler-icon"></span>-->
      <!--  </button>-->
      <!--      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">-->
      <!--        <div class="offcanvas-header">-->
                  <!--<div class="d-flex align-items-center">-->
      <!--          <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">-->
      <!--          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ユーザー</h5>-->
      <!--          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>-->
      <!--        </div>-->
      <!--        <div class="offcanvas-body">-->
      <!--          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">-->
      <!--            <li class="nav-item">-->
      <!--              <a class="nav-link active" aria-current="page" href="#">Home</a>-->
      <!--            </li>-->
      <!--            <li class="nav-item">-->
      <!--              <a class="nav-link" href="#">Link</a>-->
      <!--            </li>-->
      <!--            <li class="nav-item dropdown">-->
      <!--              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
      <!--                Dropdown-->
      <!--              </a>-->
      <!--              <ul class="dropdown-menu">-->
      <!--                <li><a class="dropdown-item" href="#">Action</a></li>-->
      <!--                <li><a class="dropdown-item" href="#">Another action</a></li>-->
      <!--                <li>-->
      <!--                  <hr class="dropdown-divider">-->
      <!--                </li>-->
      <!--                <li><a class="dropdown-item" href="#">Something else here</a></li>-->
      <!--              </ul>-->
      <!--            </li>-->
      <!--          </ul>-->
      <!--          <form class="d-flex mt-3" role="search">-->
      <!--            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
      <!--            <button class="btn btn-outline-success" type="submit">Search</button>-->
      <!--          </form>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </nav>-->
        
        <!-- フッター -->
        <footer class="bg-light bg-opacity-25 mt-auto py-4 px-3 d-flex justify-content-end">
            <a href="/admin">
              <div style="position: fixed; bottom: 20px; right: 20px; background-color: gold; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                戻る
              </div>
            </a>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    <main class="py-4">
        @yield('content')
    </main>