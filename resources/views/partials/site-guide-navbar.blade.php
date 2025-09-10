<!-- resources/views/partials/site-guide-navbar.blade.php -->
<div class="mt-3">
    <h6 class="text-center mb-2">サイト案内</h6>
    <ul class="nav flex-column gap-1">
        <li class="nav-item">
            <a class="nav-link p-2 rounded text-primary" href="{{ route('games.index') }}">
                <span class="material-symbols-outlined align-middle fs-6">sports_esports</span>
                <span class="align-middle ms-1">ゲーム一覧ページ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link p-2 rounded text-warning" href="{{ route('consoles.index') }}">
                <span class="material-symbols-outlined align-middle fs-6">devices</span>
                <span class="align-middle ms-1">コンソール一覧ページ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link p-2 rounded text-success" href="{{ route('performances.index') }}">
                <span class="material-symbols-outlined align-middle fs-6">speed</span>
                <span class="align-middle ms-1">パフォーマンス一覧ページ</span>
            </a>
        </li>
    </ul>
</div>
