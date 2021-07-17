<nav class="navbar navbar-expand-lg navbar-light navbar-default">
    <div class="container">
        <a href="<?php echo url('/'); ?>" class="navbar-brand">
            HelloLaravel
        </a>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a href="{{ action([App\Http\Controllers\BoardController::class, 'show']) }}" class="nav-link">
                    排行榜
                </a>
            </li>
            @auth
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
                    {{ auth()->user()->name }}，您好
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('students.edit_self') }}">編輯我的資料</a>
                    <a class="dropdown-item"
                        href="{{ action([App\Http\Controllers\AuthController::class,'getLogout']) }}">登出</a>
                </div>
            </li>
            @else
            <li class="nav-item active">
                <a href="{{ action([App\Http\Controllers\AuthController::class,'getLogin']) }}" class="nav-link">
                    登入
                </a>
            </li>
            @endauth
        </ul>
    </div>
</nav>