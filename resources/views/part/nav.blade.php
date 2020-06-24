<!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fas fa-home"></i> <a href="http://myanmaritc.com/" target="_blank">Myanmar IT Bootcamp</a>
        <i class="fas fa-code pl-3"></i> Japanese & IT Batch - 1 
      </div>
      <div class="social-links float-right">
        <a href="https://www.facebook.com/micbootcamp/" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.messenger.com/" class="messenger" target="_blank"><i class="fab fa-facebook-messenger"></i></a>
        <a href="https://www.skype.com/en/" class="skype" target="_blank"><i class="fab fa-skype"></i></a>
      </div>
    </div>
  </section>
  <!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <h1><a href="{{route('index')}}" class="scrollto">JP Online Corn<span>er</span></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{request()->routeIs('index') ? 'menu-active' : '' }}"><a href="{{route('index')}}">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#course">Courses</a></li>
          <li class="{{request()->routeIs('contact') ? 'menu-active' : '' }}"><a href="/contactus">Contact Us</a></li>
          @auth
          <li class="menu-has-children @if(!request()->routeIs('contact') && !request()->routeIs('index')) profile-active @endif">
            <a href="javascript:void(0)">
              <img src="{{ asset(Auth::user()->profile_pic) }}" class="rounded-circle" width="35" height="35" style="margin-top: -7px;">   <span class="px-1 font-weight-bold">{{ Auth::user()->firstname }}</span>
            </a>
            <ul>
              <li class="font-weight-bold text-center my-2">
                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
              </li>
              <li class="d-flex justify-content-start">
                <a href="@if(Auth::user()->is_Teacher){{ route('teacher.show') }}@else{{ route('student.show') }}@endif" @if(!Auth::user()->is_Teacher){{'disabled'}}@endif><i class="fas fa-user-alt mr-2"></i> My Profile</a>
              </li>
              <li class="d-flex justify-content-start">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementsByName('logout-form')[0].submit();">
                    <i class="fas fa-sign-out-alt mr-3"></i>{{ __('Logout') }}
                  </a>
                <form name="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
              </li>
            </ul>
          </li>
          @endauth

          @auth
            <hr class="dropdown-divider" class="sub-menu-nav">

            @if (Auth::user()->is_Teacher == 0)
            <!-- for student -->
            <li class="sub-menu-nav">
              <a href="{{ route('studenthome') }}"><i class="fas fa-tv mr-3"></i>Dashboard</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-clipboard-list mr-3"></i>Vocabulary</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="far fa-bookmark mr-3"></i>Grammar</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-spell-check mr-3"></i>Kanji</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-book-open mr-3"></i>Reading</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-headphones-alt mr-3"></i>Listening</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-pen-alt mr-3"></i>Writing</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="far fa-bell mr-3"></i>Notification</a>
            </li>
            @endif

            @if (Auth::user()->is_Teacher == 1)
            <!-- for sensei nav -->
            <li class="sub-menu-nav">
              <a href="{{ route('senseihome') }}"><i class="fas fa-tv mr-3"></i>Dashboard</a>
            </li>
            <li class="sub-menu-nav">
              <a href=""><i class="fas fa-clipboard-check mr-3"></i>Test</a>
            </li>
            <li class="sub-menu-nav">
              <a href="{{ route('vocab.index') }}"><i class="fas fa-clipboard-list mr-3"></i>Vocabulary</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="far fa-bookmark mr-3"></i>Grammar</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-spell-check mr-3"></i>Kanji</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-book-open mr-3"></i>Reading</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-headphones-alt mr-3"></i>Listening</a>
            </li>
            <li class="sub-menu-nav">
              <a href="{{ route('writing.index') }}"><i class="fas fa-pen-alt mr-3"></i>Writing</a>
            </li>
            <li class="sub-menu-nav">
              <a href="{{ route('showallstudents') }}"><i class="fas fa-user-friends mr-3"></i>Student</a>
            </li>
            <li class="sub-menu-nav">
              <a href="#"><i class="fas fa-chalkboard-teacher mr-3"></i>Teacher</a>
            </li>
            @endif
          @endauth

        </ul>
      </nav>
    </div>
  </header>
  <!-- End Header -->