@extends('layouts.auth.master')

@section('content')
<style>
  #particles-js {
  height: 100%;
  width: 100%;
  position: fixed;
  z-index: -100;
}
</style>
<div id="particles-js"></div>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center p-3">
        <img src="{{asset("img/wordz.png")}}" width="40%" />
      </div>
      <div class="card-body">
        <div class="d-flex text-muted justify-content-center"><i class="fas fa-user-plus fa-2x"></i></div>
        <p class="login-box-msg text-muted font-weight-bold">New user registration</p>
        <form action="{{route('register.process')}}" method="post" id="register">
          @csrf
          {{--Name--}}
          <div class="form-group mb-3">
            <div class="input-group">
              <input type="text" name="name" id="name" class="form-control" placeholder="Name">
              <div class="input-group-append">
                <div class="input-group-text ">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <small id="name-error" class="form-text text-danger"></small>
          </div>

          <div class="form-group mb-3">
            <div class="input-group">
              <input type="text" name="email" id="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text ">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <small id="email-error" class="form-text text-danger"></small>
          </div>

          <div class="form-group mb-3">
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <small id="password-error" class="form-text text-danger"></small>
          </div>

          <div class="form-group mb-3">
            <div class="input-group">
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control " placeholder="Confirm Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <small id="password-confirm-error" class="form-text text-danger"></small>
          </div>
  
        <div class="text-center mt-2 mb-3">
          <button type="submit" class="btn btn-block btn-primary">
            <i class="fas fa-user-plus"></i> Register
          </button>
          <button type="reset" class="btn btn-block btn-secondary">
            <i class="fas fa-eraser"></i> Clear
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
    {{--Hides all error validation fields--}}
    $(document).ready(function(){
      $('#name-error').hide();
      $('#email-error').hide();
      $('#password-error').hide();
      $('#password-confirm-error').hide();
    });

    function formAjax(formData){
      return $.ajax({
        url:"/membership/process",
        data:formData,
        type:"POST"
      });
    }

    {{--Remove field errors when keyup event--}}
    $("#register").find(":input").on("keyup",function(){
      if($(this).hasClass("is-invalid")){
        $(this).removeClass("is-invalid");
        if($(this).attr('name')==="name"){
          $('#name-error').hide();
        }
        if($(this).attr('name')==="email"){
          $('#email-error').hide();
        }
        if($(this).attr('name')==="password"){
          $('#password-error').hide();
        }
        if($(this).attr('name')==="password_confirmation"){
          $('#password-confirm-error').hide();
        }
      }
    });

    $("#register").on("submit",function(e){
      e.preventDefault();
      let formData = $(this).serialize();
      formAjax(formData).done(function(res){

        if(res.hasOwnProperty("error")){
          if(res.error.hasOwnProperty('name')){
            $("#name-error").show();
            $("#name").addClass('is-invalid');
            $('#name-error').html(res.error.name);
          }
          if(res.error.hasOwnProperty('email')){
            $("#email-error").show();
            $("#email").addClass('is-invalid');
            $('#email-error').html(res.error.email);
          }

          if(res.error.hasOwnProperty('password')){
            $("#password-error").show();
            $("#password").addClass('is-invalid');
            $('#password-error').html(res.error.password);
          }

          if(res.error.hasOwnProperty('password_confirmation')){
            $("#password-confirm-error").show();
            $("#password_confirmation").addClass('is-invalid');
            $('#password-confirm-error').html(res.error.password_confirmation);
          }
        }

        else if(res.hasOwnProperty("status")){
          Swal.fire({
            title: 'Success!',
            text: res.message,
            icon: 'success',
            confirmButtonText: 'Ok',
            position: 'center',
            heightAuto: false,
          }).then(function() {
            window.location.href = "/";
          });
          
        }
        
      }).fail(function(jqXHR){
        if(jqXHR.status==500 || jqXHR.status==0){
            alert(jqXHR.statusText);
        }
      });
    });

  </script>
@endsection