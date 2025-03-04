<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.header')
    
</head>

@include('admin.sidebar')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      
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
    </ul>
  </nav>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        @include('admin.alert')
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary mt-3">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
              </div>
              @yield('content')
            </div>
            </div>
          <div class="col-md-6">

          </div>
        </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 2025
    </div>
    <strong>Copyright &copy; 2025-2026<a href="#">SAMSUNG RECRUITMENT</a>.</strong> All rights reserved.
  </footer>

</div>

    @include('admin.footer')

</body>
</html>