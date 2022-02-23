<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @guest()
        <ul>
            <li><a href="{{route('auth.login.form')}}">login</a></li>
            <li><a href="{{route('auth.register.form')}}">register</a></li>
        </ul>
    @endguest
    @auth()
        <ul>
            <li>{{\Illuminate\Support\Facades\Auth::user()->name}}</li>
            <li>change pass</li>
            <li>exit</li>
            <li><a href="{{route('auth.logout')}}">logout</a></li>
        </ul>
    @endauth
    <div dir="rtl">
        <br>
        @if(session('verifyEmail'))
            @lang('auth.verifyEmail')
        @endif
        @yield('content')
    </div>
</body>
</html>
