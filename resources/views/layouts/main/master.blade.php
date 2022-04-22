
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}} | {{ucwords($title)}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <style>
    .navbar-light .navbar-nav .active a::after {
      border-bottom: 5px solid #2FA360;
      bottom: -9px;
      content: " ";
      left: 0;
      position: absolute;
      right: 0;
    }
  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

<!-- ./wrapper -->
<script src="{{asset('js/app.js')}}"></script>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
    <a class="navbar-brand" href="{{route('home.index')}}">
      <img src="{{asset("img/wordz.png")}}" width="100px" height="20px" />
    </a>
    </button>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link"  href="#">Welcome, {{Auth::user()->name}}</a>
          </li>

          <li class="nav-item @if(!empty($active) && strcasecmp($active,'search')==0) active @endif">
            <a class="nav-link"  href="{{route('home.index')}}">
              <i class="fas fa-search"></i> Search
            </a>
          </li>

          <li class="nav-item @if(!empty($active) && strcasecmp($active,'bookmark')==0) active @endif">
            <a class="nav-link" href="{{url('bookmark/list/'.Auth::user()->id)}}"><i class="fas fa-bookmark"></i> Bookmark Wordz</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('home.logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
            <h3 class="text-center">{!!$icon!!} {{ucwords($title)}}</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  @yield("content")
  
</div>
<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> Wordz.</strong>
    All rights reserved.
  </footer>
</div>
</body>
</html>
