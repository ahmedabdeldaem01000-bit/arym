<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link" style="font-weight: bold !important;  ">
      <style>
        
.font-weight-light{
  font-weight: bold !important;
}
      </style>
        <img src="{{asset('pic/LOGO2.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span> -->
        <span class="brand-text font-weight-light" > قوات امن الاسماعلية</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="font-weight: bold;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
 
          </li>
          <li class="nav-item">
            <a href="{{ route('regiment.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                السرايا
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('soldiers.create') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              اضافه جندي
               </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('soldiers-data.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              بيانات الجنود
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('leaves.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
           الاجازات
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('batches.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
           الدفعات
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vacation_permits.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
           تصاريح اجازه
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
           
        </ul>
      </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    #logout {
        border: none;
        cursor: pointer;
        background: transparent;
        color: #d0d4db;
        margin-left: -3px;
    }

    #logout:hover {
        color: white;
    }
</style>