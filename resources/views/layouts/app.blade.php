<!doctype html>
<html lang="en">

<head>
    <title>AdminLTE System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=idevice-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="x-icon" href="{{ asset('theme/dist/img/AdminLTELogo.png') }}">

    @include('layouts.layout_elements.assets.css-assets')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.layout_elements.header')

        @include('layouts.layout_elements.sidebar')
        <div class="content-wrapper">
            @include('layouts.layout_elements.flash-message')

            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.layout_elements.footer')
    </div>
</body>

@include('layouts.layout_elements.assets.js-assets')

</html>
