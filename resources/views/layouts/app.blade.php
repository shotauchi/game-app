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
        <nav class="navbar bg-light d-flex justify-content-between px-3">
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

        <main class="py-4">
            @yield('content')
        </main>
        
        <!-- フッター -->
        <footer class="bg-light mt-auto py-4 px-3 d-flex justify-content-end">
        <div class="rounded-circle bg-warning d-flex justify-content-center align-items-center" style="width: 70px; height: 70px;">
            戻る
        </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
