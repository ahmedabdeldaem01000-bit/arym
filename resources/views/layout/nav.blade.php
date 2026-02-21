<!-- <div class="preloader flex-column justify-content-center align-items-center bg-dark">
    <img class="animation__shake" src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div> -->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
        <!-- <a href="{{route('home')}}" class="brand" style="width: 50px;">

        <img src="{{asset('pic/LOGO2.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
       
        <span class="brand-text font-weight-light" >قوات أمن الاسماعلية</span>
    </a> -->

    </li>
    </ul>
    <!-- <ul class="navbar-nav">
        <li class="nav-item" style="text-align: center;">
        <img src="{{asset('pic/pic1.jpg')}}" alt="AdminLTELogo" height="60" width="60">

        </li>
    </ul> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown dropdown-notifications">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge data-count">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li>
            <p class="info_kowatelamn">
             وزارة الداخلية <br/>
             مديرية أمن الاسماعلية <br/>
          <span>  ادارة قوات امن الاسماعلية <br/></span>  
             
            </p>
        </li>
    </ul>
</nav>
<style>
.info_kowatelamn{
    text-align: center;
    font-weight: bold;
}


</style>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('layout.sidebar')
