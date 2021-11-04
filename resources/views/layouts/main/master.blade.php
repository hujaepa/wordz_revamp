
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}} | Blank</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

<!-- ./wrapper -->
<script src="{{asset('js/app.js')}}"></script>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
    <a class="navbar-brand" href="#">
      <img src="{{asset("img/wordz.png")}}" width="100px" height="20px" />
    </a>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link" href="#">Welcome, {{Auth::user()->name}}</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-list-alt"></i> Favourite Wordz</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}"><i class="fas fa-door-open"></i>Logout</a>
          </li>
        </ul>
      </div>
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="text-center">Search</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  @yield("content")
  
</div>
<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
</body>
</html>
