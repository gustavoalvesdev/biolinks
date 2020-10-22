<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('assets/css/admin.template.css') }}">
</head>
<body>
    <nav>
        <div class="nav-top">
            <a href="{{ url('/admin') }}">
                <i class="fas fa-file"></i>
            </a>
        </div>
        <!-- nav-top -->
        <div class="nav-bottom">
            <a href="{{ url('/admin/logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
        <!-- nav-bottom -->
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <!-- container -->

    <script src="https://kit.fontawesome.com/aa1d7fc9dd.js" crossorigin="anonymous"></script>
</body>
</html>