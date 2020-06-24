<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login | Japanese Online Corner</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&family=Nunito:wght@400;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/css/all.css') }}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body>
  <section id="register" class="bg-light">
   <div class="container">
    <div class="registercard shadow bg-white" style="height: 96vh">
      <div class="row">
        
        <div class="col-lg-6">
          <img src="{{ asset('assets/img/login.jpg') }}" class="img-fluid" style="height: 96vh">
        </div>

        <div class="col-lg-6 form-div">
          <h2>JP Online Corn<span>er</span></h2>
          <h4 class="mt-4">Welcome Back!</h4>
          <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group row">
            <div class="col-md-12">
              <div class="group">      
                  <input  id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  @error('email')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <label>Email Address</label>
               </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <div class="group">      
                  <input  id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="off">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  @error('password')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <label>Password</label>
               </div>
            </div>
          </div>


          <div class="form-group px-3 remember">
            <div class="col-12">
                <div class="custom-control custom-checkbox ">
                  <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="custom-control-label check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-get-started">Log in</button>
              </div>
            </div>

            <div class="form row">
              <div class="col-12 text-center mb-3">
                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          <i class="fas fa-key"></i> {{ __('Forgot Your Password?') }}
                      </a>
                  @endif |
                  <a href="{{ route('register') }}" class="btn btn-link"><i class="fas fa-user-plus"></i> New Member?</a>
                </div>
              </div>
          </div>
          </form>
        </div>

      </div>  <!-- row end -->        
          
      </div> <!-- register card end -->  
    </div>  <!-- container end -->

  </section>

  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>