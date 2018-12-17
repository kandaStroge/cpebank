<!doctype html>
<html lang="en">
<head>
    @include('admin.layout.head')
    @yield('head')
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/admin">CPEBlank-ADMIN</a>
    {{--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">

            <a class="nav-link" href="/logout">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        @include('admin.layout.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('content-header')</h1>
            </div>
            <div class="container">
                @include('admin.layout.error')
                @yield('content')
            </div>
        </main>

    </div>
</div>
@include('admin.layout.footer')

</body>
</html>