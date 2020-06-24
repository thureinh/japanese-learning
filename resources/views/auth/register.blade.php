<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Create Account | Japanese Online Corner</title>
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
    <div class="registercard shadow bg-white">
      <div class="row">
        
        <div class="col-lg-5">
          <img src="{{ asset('assets/img/register.jpg') }}" class="img-fluid">
        </div>

        <div class="col-lg-7 form-div">
          <h2>JP Online Corn<span>er</span></h2>
          <h4 class="mt-4">Create New Account</h4>
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf

            <div class="form row">
              <div class="col-md-6">
                <div class="group">      
                  <input  id="firstname" type="text" name="firstname" value="{{ old('firstname') }}" required autocomplete="off" autofocus>
                  @error('firstname')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>First Name</label>                 
                </div>
              </div> 

              <div class="col-md-6">
                <div class="group">      
                  <input  id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" required autocomplete="off">
                  @error('lastname')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Last Name</label>
                </div>
              </div>
            </div>

            <div class="form row">
              <div class="col-md-6">
                <div class="group">      
                  <input  id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="off">
                  @error('email')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Email</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="group">      
                  <input  id="phone" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="off">
                  @error('phone')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Phone No</label>
                </div>
              </div>
            </div>

            <div class="form row">
              <div class="col-md-6">
                <div class="group">      
                  <input  id="passoword" type="password" name="password" value="{{ old('passoword') }}" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                  @error('passoword')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Password</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="group">      
                  <input  id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required  autocomplete="off">
                  @error('password_confirmation')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Confirm Password</label>
                </div>
              </div>
            </div>

            <div class="form row">
              <div class="col-md-6 my-lg-2 pt-1">
                <div class="group">      
                  <input  id="dob" type="date" name="dob" value="{{ old('dob') }}" max="2000-12-31" required>
                  @error('dob')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label class="extra-label">Date of Birth</label>
                </div>
              </div>

              <div class="col-md-6 my-lg-2">
                <div class="group">      
                  <input  id="profile" type="file" name="profile" value="{{ old('profile') }}" required   accept="image/*">
                  @error('profile')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label class="extra-label">Profile Picture</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 my-lg-2">
                <div class="group">      
                  <input  id="address" type="text" name="address" value="{{ old('address') }}" max="2000-12-31" required autocomplete="off">
                  @error('address')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Address</label>
                </div>
              </div>
            </div>

            <h6>Class Info</h6>
            <div class="form row">
              <div class="col-md-6">
                <div class="group">      
                  <input  id="batch" type="number" name="batch_no" value="{{ old('batch') }}" required autocomplete="off" min="1" max="50">
                  @error('batch_no')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Batch No</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="group">      
                  <input  id="roll" type="number" name="roll_no" value="{{ old('roll') }}" required autocomplete="off" max="50" min="1">
                  @error('roll_no')
                    <span class="error-text">{{ $message }}</span>
                  @enderror
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Roll No</label>
                </div>
              </div>
            </div>
            
            <div class="form row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-get-started">Register</button>
              </div>
            </div>
            
            <div class="form row">
              <div class="col-12 text-center mb-3">
                <a href="{{ route('login') }}" class="mr-2 btn btn-link"><i class="fas fa-sign-in-alt pr-2"></i> Already Have Account?</a> |
                <a href="{{ route('index') }}" class="ml-2 btn btn-link"><i class="fas fa-home pr-2"></i>Back to Home</a>
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