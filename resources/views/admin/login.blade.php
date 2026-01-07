<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}" type="image/x-icon">
    <title>Admin Login - Asynmi</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/responsive.css')}}">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('admin/images/login/2.jpg')}}" alt="looginpage"></div>
        <div class="col-xl-5 p-0">
          <div class="login-card login-dark">
            <div>
              <div>
                <a class="logo text-start d-flex justify-content-center" href="/">
                  <img class="img-fluid for-dark" src="{{asset('assets/img/logo.png')}}" style="height: 60px !important; " alt="looginpage">
                  <img class="img-fluid for-light" src="{{asset('assets/img/logo.png')}}" style="height: 60px !important; " alt="looginpage">
                </a>
              </div>
              <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <h4>Sign in to account</h4>
                    <p>Enter your email / username & password to login</p>

                    <div class="form-group">
                        <label class="col-form-label">Email / Username</label>
                        <input class="form-control @error('email') is-invalid @enderror" 
                            type="text" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter email or username">
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                            <input class="form-control @error('password') is-invalid @enderror" 
                                type="password" name="password" required placeholder="*********">
                            <div class="show-hide"><span class="show"></span></div>
                        </div>
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="{{asset('admin/js/jquery.min.js')}}"></script>
      <!-- Bootstrap js-->
      <script src="{{asset('admin/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <!-- feather icon js-->
      <script src="{{asset('admin/js/icons/feather-icon/feather.min.js')}}"></script>
      <script src="{{asset('admin/js/icons/feather-icon/feather-icon.js')}}"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{asset('admin/js/config.js')}}"></script>
      <!-- Plugins JS start-->
      <!-- calendar js-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{asset('admin/js/script.js')}}"></script>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const showHide = document.querySelector('.show-hide');
          const input = showHide?.previousElementSibling;

          if (showHide && input) {
            showHide.addEventListener('click', function() {
              if (input.type === 'password') {
                input.type = 'text';
                // this.querySelector('span').textContent = 'Hide';
              } else {
                input.type = 'password';
                // this.querySelector('span').textContent = 'Show';
              }
            });
          }
        });
    </script>

  </body>
</html>