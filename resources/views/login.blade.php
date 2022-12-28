 {{-- <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>LOGIN</title>

     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
 </head>

 <body class="hold-transition login-page">
     <div class="login-box">
         <div class="login-logo">
             <a href="../../index2.html"><b>UAS</b> BACKEND</a>
         </div>
         <!-- /.login-logo -->
         <div class="card">
             <div class="card-body login-card-body">
                 @if (session('error'))
                     <div class="alert alert-danger text-center">
                         {{ session('error') }}
                     </div>
                 @endif
                 @if (session('success'))
                     <div class="alert alert-success text-center">
                         {{ session('success') }}
                     </div>
                 @endif
                 <p class="login-box-msg">Masuk ke akun anda</p>

                 <form action="{{ url('/login63') }}" method="post">
                     @csrf
                     <div class="input-group mb-3">
                         <input name="email" type="email" class="form-control" placeholder="Email">
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-envelope"></span>
                             </div>
                         </div>
                     </div>
                     <div class="input-group mb-3">
                         <input name="password" type="password" class="form-control" placeholder="Password">
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-lock"></span>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-8">
                             <div class="icheck-primary">
                                 <input type="checkbox" id="remember">
                                 <label for="remember">
                                     Remember Me
                                 </label>
                             </div>
                         </div>
                         <!-- /.col -->
                         <div class="col-4">
                             <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                         </div>
                         <!-- /.col -->
                     </div>
                 </form>

                 <div class="social-auth-links text-center mb-3">
                     <p>- ATAU -</p>
                     <a href="#" class="btn btn-block btn-primary">
                         <i class="fab fa-facebook mr-2"></i> Masuk dengan Facebook
                     </a>
                     <a href="#" class="btn btn-block btn-danger">
                         <i class="fab fa-google-plus mr-2"></i> Masuk dengan Google+
                     </a>
                 </div>
                 <!-- /.social-auth-links -->

                 <p class="mb-0 text-center">
                     <a href="{{ url('/register63') }}" class="text-center">Tidak punya akun? Buat akun.</a>
                 </p>
             </div>
             <!-- /.login-card-body -->
         </div>
     </div>
     <!-- /.login-box -->

     <!-- jQuery -->
     <script src="plugins/jquery/jquery.min.js"></script>
     <!-- Bootstrap 4 -->
     <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- AdminLTE App -->
     <script src="dist/js/adminlte.min.js"></script>
 </body>

 </html> --}}

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Page</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
     <style type="text/css">
         /*
    *
    * ==========================================
    * CUSTOM UTIL CLASSES
    * ==========================================
    *
    */
         .login,
         .image {
             min-height: 100vh;
         }

         .bg-image {
             background-image:
                 url('https://cdnwpedutorepartner.gramedia.net/wp-content/uploads/2020/05/07152054/profesi-programmer.jpg');
             background-size: cover;
             background-position: center center;
         }
     </style>
 </head>

 <body>
     <div class="container-fluid">
         <div class="row no-gutter">
             <!-- The image half -->
             <div class="col-md-6 d-none d-md-flex bg-image"></div>


             <!-- The content half -->
             <div class="col-md-6 bg-light">
                 <div class="login d-flex align-items-center py-5">
                     <div class="card-body login-card-body">


                         <!-- Demo content-->
                         <div class="container">
                             <div class="row">
                                 <div class="col-lg-10 col-xl-7 mx-auto">
                                     <h3 class="display-4">UAS BACKEND</h3>
                                     <p class="text-muted mb-4">Login UAS Backend.</p>

                                     <p>
                                         @if (session('error'))
                                             <div class="alert alert-danger text-center">
                                                 {{ session('error') }}
                                             </div>
                                         @endif
                                         @if (session('success'))
                                             <div class="alert alert-success text-center">
                                                 {{ session('success') }}
                                             </div>
                                         @endif
                                     <form action="{{ url('/login63') }}" method="post">
                                         {{-- <form method="POST" action="{{ route('login') }}"> --}}
                                         @csrf
                                         @error('email')
                                             <div class="alert alert-danger" role="alert">
                                                 <i class="fa fa-exclamation-triangle"></i>
                                                 {{ $message }}
                                             </div>
                                         @enderror
                                         <div class="form-group">
                                             <label for="email">Email</label>
                                             <input type="email"
                                                 class="form-control @error('email') is-invalid @enderror"
                                                 id="email" name="email" required autocomplete="email"
                                                 value="{{ old('email') }}">
                                         </div>
                                         <div class="form-group mb-5">
                                             <label for="password">Password</label>
                                             <input type="password"
                                                 class="form-control @error('email') is-invalid @enderror"
                                                 id="password" name="password" required autocomplete="new-password">
                                         </div>

                                         <div class="custom-control custom-checkbox mb-3">
                                             <input id="customCheck1" type="checkbox" checked
                                                 class="custom-control-input">
                                             <label for="customCheck1" class="custom-control-label">Remember
                                                 password</label>
                                         </div>
                                         <button type="submit"
                                             class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Login</button>
                                         <div class="text-center text-lg-start mt-4 pt-2">
                                             </p>


                                             <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                                     href="{{ url('/register63') }}" class="link-danger">Register</a>
                                             </p>

                                         </div>

                                     </form>
                                 </div>
                             </div>
                         </div><!-- End -->

                     </div>
                 </div><!-- End -->

             </div>
         </div>


 </html>
