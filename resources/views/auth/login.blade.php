@extends('layouts.auth.master')

@section('content')
<div id="particles-js"></div>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <span class="h1"><b>Wordz</b></span>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
  
        <form action="../../index3.html" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </form>
  
        <div class="text-center mt-2 mb-3">
          <button type="submit" class="btn btn-block btn-primary">
            <i class="fas fa-sign-in-alt"></i> Login
          </button>
        </div>
  
        <p class="mb-1 mx-auto">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
@endsection