<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acme</title>
    <link rel="stylesheet" href="/css/app.css"/>
</head>
<body>
    @include('inc.nav')

    <div class="container">
        @if (Request::is('/'))
            @include('inc.showcase')
        @endif
        <div class="row">
            <div class="col-md-8">
                @include('inc.errors')
                @yield('content')
            </div>
            <div class="col-md-4">
                @include('inc.sidebar')
            </div>
        </div>
    </div>

    <footer id="footer" class="text-center">
        <p>Copyright 2018 &copy; Acme</p>
    </footer>
</body>
</html>