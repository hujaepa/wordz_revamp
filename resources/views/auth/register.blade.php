@extends('layouts.auth.master')

@section('content')
<div id="particles-js"></div>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center p-3">
        {{-- <span class="h1"><b>Wordz</b></span> --}}
        <img src="{{asset("img/wordz.png")}}" width="40%" />
      </div>
      <div class="card-body">
        @if($errors->has('email') || $errors->has('password') )
          <p class="login-box-msg text-danger font-weight-bold">Please enter both of the informations</p>
        @else
          <p class="login-box-msg text-muted font-weight-bold"><i class="fas fa-user-plus"></i> New user registration</p>
        @endif
        <form action="{{route('login.process')}}" method="post" id="login">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control  @if($errors->has('email')) is-invalid @endif" placeholder="Email" value="{!!old('email')!!}">
            <div class="input-group-append">
              <div class="input-group-text ">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" id="password2" name="password2" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
  
        <div class="text-center mt-2 mb-3">
          <button type="submit" class="btn btn-block btn-primary">
            <i class="fas fa-user-plus"></i> Register
          </button>
        </div>
        </form>
  
        <p class="mb-0">
          <a href="{{url('/')}}" class="text-center">Back to login</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <script>
    $("#email").on("focus",function(){
      $(this).removeClass('is-invalid');
    });
    $("#password").on("focus",function(){
      $(this).removeClass('is-invalid');
    });
  </script>
@endsection