<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <a href="/admin">admin</a>
        @if(session()->has('login-user-fname'))
            {{session()->get('login-user-fname')}}

{{--            {{session()->get('user-fname')}}--}}
        @endif
        <a href="/login">Login </a>
        <a href="/logout">| Logout</a>
        <a href="/reset">| reset password</a>
    </div>
</div>
</body>
</html>
