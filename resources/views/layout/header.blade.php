            <!-- Content Header (Page header) -->
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-link p-0">
        Logout
    </button>
</form>                                
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
             <style>
                table{
                    direction: rtl;
                }
            h1{
                color: white;
                font-weight: bold;
            }
              
             </style>
             