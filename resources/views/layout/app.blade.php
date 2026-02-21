@include('layout.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('layout.nav')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper background_body">
            @include('layout.header')

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        @include('layout.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout.scripts')
</body>
<style>
    .background_body{
        background-image: url({{ asset('pic/pic1.jpg') }});
        background-size: cover;
            background-repeat: no-repeat;
            background-position: center top;
    }
</style>
</html>