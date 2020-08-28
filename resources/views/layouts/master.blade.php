<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>@yield('title')</title>
</head>

<body class="sb-nav-fixed">

    @include('layouts.navbar')

    @include('layouts.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                @yield('content')
            </div>

            @include('layouts.script')
</body>

</html>
