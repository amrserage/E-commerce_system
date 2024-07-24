    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('admin.layout.head')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <!-- Preloader -->
    
<!-- Navbar -->
    @include('admin.layout.main_header')

    <!-- Main Sidebar Container -->
    @include('admin.layout.main_sidebar')

    <!-- Content Wrapper. Contains page content -->
    
        <!-- Content Header (Page header) -->
                    <!-- Main content -->
                
                <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">@yield('title_page')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            
        </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
        <div class="card">
        @yield('content')
        </div>
        </div>
    </section>
    </div>
    
        <!-- /.content-header -->
        
        <!-- Main content -->
        
                <!-- Calendar -->
                
        
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin.layout.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    
    <!-- jQuery -->
    
    <!-- Bootstrap 4 -->
</div>
    @include('admin.layout.footer_script')
    
    </body>
    </html>
        