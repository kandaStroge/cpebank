<!DOCTYPE html>
<html lang="en">

<head>
    @include('customer.layouts.header')
    @yield('head')
    <title>@yield('title')</title>

</head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    @include('customer.layouts.nav')

    <div id="page-wrapper">
        @yield('content')
    </div>

</div>

@include('customer.layouts.footer')
@yield('footer')

</body>

</html>