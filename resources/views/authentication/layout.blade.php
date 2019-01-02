<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/admin/bootstrap4/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
    <link rel="stylesheet" href="public/lib/package/dist/sweetalert2.min.css">
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/lib/package/dist/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('public/admin/bootstrap4/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/js/script.js') }}"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>