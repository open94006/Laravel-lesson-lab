<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @include('partials.head')
</head>

<body>
    @include('partials.nav')
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>

</html>