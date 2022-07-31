<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تسجيل الدخول </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('cms/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('cms/dist/css/adminlte.min.css')}}">

  <style>
    #login-form>div.input-group {
      direction: rtl;
    }

    #login-form>div.row {
      flex-direction: row-reverse;

    }

    #login-form .icheck-primary {
      text-align: right;
    }

    #login-form .icheck-primary label {
      padding-right: 29px;
      padding-left: 0px;
    }

    #login-form .icheck-primary label::before {
      right: 0;
      margin-left: 0;
    }

    #form-login-body>p {
      text-align: right
    }

    #form-card img.logo {
      display: block;
      max-width: 100%;
      margin: auto;
    }

    #login-form input {
      border-top-left-radius: 0px;
      border-bottom-left-radius: 0px;
    }

    /* #login-form button{
     width: 119px; */

    #login-form button {
      width: 119px;
    }
  </style>

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary" id="form-card">
      <div class="card-header text-center">
        <img src="{{asset('/cms/dist/img/moh.png')}}" class="logo" />
        <a href="cms/index2.html" class="ma">نظام إحصاء الكادر البشري وزارة الصحة</a>
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5 style="margin-left: 160px"> !خطأ <i class="icon fas fa-ban"></i></h5>
          <h6 style="margin-left: 100px">{{session('error')}}</h6>
        </div>
        @endif
        {{-- --}}
      </div>
      <div class="card-body" id="form-login-body">
        {{-- <p class="login-box-msg"></p> --}}

        <form id="login-form" action="{{route('cms.post.login')}}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="رقم الهوية" name="user_id_number">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>

            </div>
            @error('user_id_number')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="كلمة السر" name="user_password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('user_password')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember_me">
                <label for="remember">
                  تذكرني
                </label>
              </div>
            </div>

            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول </button>
              {{-- <a href="{{route('cms.homepage')}}" class="btn btn-primary btn-block">تسجيل الدخول</a> --}}
              {{-- <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button> --}}

            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">نسيت كلمة السر</a>
        </p>
        <p class="mb-0">
          <a href="{{route('cms.register')}}" class="text-center">تسجيل حساب جديد</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('cms/dist/js/adminlte.min.js')}}"></script>
</body>

</html>