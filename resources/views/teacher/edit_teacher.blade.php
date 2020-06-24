@extends('template')
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{asset('assets/imageUpload/style.css')}}">
@endsection

@section('content')
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <main id="maincontent">

    <section id="profile">

      <div class="container">
        <form method="POST" action="{{ route('teacher.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">

         <div class="mobile-view">
          <h4 class="text-center mb-4">Edit Profile of {{ $teacher->firstname }} {{ $teacher->lastname }}</h4>
        </div>

        <div class="row">
          <div class="col-md-3 profile-image">
            <div class="img-wrap shadow">
              <div class="title" style="padding-top: 5px;">
                <h1>Drop file to upload</h1>
              </div>

              <div class="dropzone" style="margin: 0 auto;">
                <img id="blah" src="{{ asset($teacher->profile_pic) }}" alt="my profile" class="upload-icon"/ style="width: 100%;height: 120px">
                <input type="file" class="upload-input" name="profile" onchange="readURL(this);"/>
              </div>
            </div>
          </div>

          <div class="col-md-9 sub-menu-content">
            <div class="px-lg-4">
              <h4 class="desktop-view">Edit Profile of {{ $teacher->firstname }} {{ $teacher->lastname }}</h4>
            
              <div class="shadow p-4 rounded info edited-form">
                <div class="form row pt-4">
                  <div class="col-md-6">
                    <div class="group">      
                      <input  id="firstname" type="text" name="firstname" value="{{ $teacher->firstname }}" required autocomplete="off">
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
                      <input  id="lastname" type="text" name="lastname" value="{{ $teacher->lastname }}" required autocomplete="off">
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
                      <input  id="email" type="email" name="email" value="{{ $teacher->email }}" required autocomplete="off">
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
                      <input  id="phone" type="text" name="phone" value="{{ $teacher->phone }}" required autocomplete="off">
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
                  <div class="col-md-6 my-lg-2 pt-1">
                    <div class="group">      
                      <input  id="dob" type="date" name="dob" value="{{ $teacher->dateofbirth->format('Y-m-d') }}" max="2000-12-31" required>
                      @error('dob')
                        <span class="error-text">{{ $message }}</span>
                      @enderror
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label class="extra-label">Date of Birth</label>
                    </div>
                  </div>
                  <div class="col-md-6 my-lg-2 pt-1">
                    <div class="group">      
                      <input  id="address" type="text" name="address" value="{{ $teacher->address }}" max="2000-12-31" required autocomplete="off">
                      @error('address')
                        <span class="error-text">{{ $message }}</span>
                      @enderror
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Address</label>
                    </div>
                  </div>
                </div>
            
                <div class="form row">
                  <div class="col-md-6">
                    <a type="button" class="btn btn-outline-secondary btn-block mb-3" href="{{ route('teacher.show') }}">Cancel</a>
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-add btn-block mb-3">Update</button>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div> <!-- row -->
        </form>
      </div>
    </section>
  </main>
@endsection

@section('js')
<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#blah')
                  .attr('src', e.target.result)
                  .width(150)
                  .height(150)
                  .css("margin-top", "0px");
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
@endsection