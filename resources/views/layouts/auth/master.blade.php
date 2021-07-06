<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> {{config('app.name')}} | {{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset("js/particles.js")}}"></script>
<script>
    /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    particlesJS.load('particles-js', 'js/particles.json');
</script>
  <style>
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #1d6aa8;
        background-image: url("");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 50%;
    }
  </style>
</head>
<body class="hold-transition login-page">
    @yield('content')
</body>
</html>
