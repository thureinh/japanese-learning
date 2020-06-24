@extends('template')

@section('content')

  <!-- ======= Intro Section ======= -->
  <section id="intro">

    <div class="intro-content">
      <h2>Making <span>our dreams</span> <br>come true!
      </h2>
      @if(!Auth::check())
      <div>
        <a href="{{route('login')}}" class="btn-login scrollto">Log in</a>
        <a href="{{route('register')}}" class="btn-register scrollto">Create Account</a>
      </div>
      @endif
    </div>

    <div id="intro-carousel" class="owl-carousel">
      <div class="item" style="background-image: url('assets/img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('assets/img/intro-carousel/5.jpg');"></div>
    </div>

  </section>
  <!-- End Intro Section -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="{{ asset('assets/img/about-img.png') }}" alt="about">
          </div>

          <div class="col-lg-6 content">
            <h2>Improve your language skill with JP Online Corner</h2>
            <h3>"Learn Fast, Think Deep and Achieve Your Dream!"</h3>
            <p>The web application is developed for the Students to be able to learn and practice Japanese easily from Online.</p>
            <ul>
              <li><i class="fas fa-check"></i> Study Daily Japanese Words & Grammar with Explanations</li>
              <li><i class="fas fa-check"></i> Learn Kanji with Examples</li>
              <li><i class="fas fa-check"></i> Practice Questions for Vocab, Grammar, Reading, Listening, Kanji</li>
              <li><i class="fas fa-check"></i> Take a Test as Additional Practice and Apply in Real Test</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features">
      <div class="container">
        <div class="section-header">
          <h2>Features</h2>
          <p>With this application, students can learn Japanese and practice questions assigned by teachers. The system is also developed to be easy-to-use and responsive in order to learn comfortably.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="fas fa-clipboard-list"></i></div>
              <h4 class="title">Vocabulary</h4>
              <p class="description">Double your Japanese vocabularies with different topic every day, and practice with recommended questions to remember them.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="far fa-bookmark"></i></div>
              <h4 class="title">Kanji</h4>
              <p class="description">View kanji words with its Konyomi and Onyomi, including example sentences and various word lists, which advance your Japanese skills.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <div class="icon"><i class="fas fa-spell-check"></i></div>
              <h4 class="title">Grammar</h4>
              <p class="description">Learn grammar with interesting explanations and patterns, where you can also take practice questions as in JLPT exam.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="icon"><i class="fas fa-book-open"></i></div>
              <h4 class="title">Reading</h4>
              <p class="description">Improve your reading speed with this application and practice or take a test with different reading paragraph to know your skills.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <div class="icon"><i class="fas fa-headphones-alt"></i></div>
              <h4 class="title">Listening</h4>
              <p class="description">Listen Japanese audios and mp3 to be friendly with Japanese speaking. Listening skills can be also checked with practice questions and exams.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="icon"><i class="fas fa-pen-alt"></i></div>
              <h4 class="title">Writing</h4>
              <p class="description">Create flawless writings with interesting topic, suggested by the teacher. Marks can be viewed in each writing, checked by teacher.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Features Section -->

    <!-- ======= Teacher Section ======= -->
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Teachers</h2>
          <p>Thank to our patient and skillful Japanese teachers, Japanese culture, knowledge and lectures are trained and learnt with different activities and games together during the whole year. </p>
        </div>
        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="{{ asset('assets/img/testimonial-1.jpg') }}" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4 class="mb-4">Ceo &amp; Founder</h4>
            <p>
              <img src="{{ asset('assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <img src="{{ asset('assets/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('assets/img/testimonial-2.jpg') }}" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4 class="mb-4">Designer</h4>
            <p>
              <img src="{{ asset('assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <img src="{{ asset('assets/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('assets/img/testimonial-3.jpg') }}" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4 class="mb-4">Store Owner</h4>
            <p>
              <img src="{{ asset('assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <img src="{{ asset('assets/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('assets/img/testimonial-4.jpg') }}" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4 class="mb-4">Freelancer</h4>
            <p>
              <img src="{{ asset('assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <img src="{{ asset('assets/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('assets/img/testimonial-5.jpg') }}" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4 class="mb-4">Entrepreneur</h4>
            <p>
              <img src="{{ asset('assets/img/quote-sign-left.png') }}" class="quote-sign-left" alt="">
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <img src="{{ asset('assets/img/quote-sign-right.png') }}" class="quote-sign-right" alt="">
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Teacher Section -->

    <!-- ======= Goal Section ======= -->
    <section id="goal" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Our Goal</h3>
            <p class="cta-text">To be a Professional with required Soft skills and Technical skills in our Jobs, and to be able to speak Japanese Fluently with Natives and must Pass <strong>N3</strong> in December JLPT! </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{route('register')}}">Get Start Now</a>
          </div>
        </div>

      </div>
    </section>
    <!-- Goal Section -->

    <!-- ======= Student Section ======= -->
    <!-- <section id="students" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Student</h2>
          <p></p>
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="assets/img/clients/client-1.png" alt="">
          <img src="assets/img/clients/client-2.png" alt="">
          <img src="assets/img/clients/client-3.png" alt="">
          <img src="assets/img/clients/client-4.png" alt="">
          <img src="assets/img/clients/client-5.png" alt="">
          <img src="assets/img/clients/client-6.png" alt="">
          <img src="assets/img/clients/client-7.png" alt="">
          <img src="assets/img/clients/client-8.png" alt="">
        </div>

      </div>
    </section> -->
    <!-- End Students Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="portfolio" class="clearfix fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>There were many memorable and fun activities such as Making Onigiri, Sushi, Playing Card Games, Doing Group Competitions, usually on Fridays, during our time at MMIT.</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-food">Food</li>
              <li data-filter=".filter-game">Game</li>
              <li data-filter=".filter-group">Group</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-food">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/app1.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Onigiri Day</h4>
                <p>17.01.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/app1.jpeg') }}" data-gall="portfolioGallery" title="Onigiri Day" class="venobox link-preview"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-food" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/web3.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Sushi Day</h4>
                <p>07.03.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/web3.jpeg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="Sushi Day"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-food" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/app2.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Onigiri Day</h4>
                <p>17.01.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/app2.jpeg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="Onigiri Day"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-food">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/card2.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Sushi Day</h4>
                <p>07.03.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/card2.jpeg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="Sushi Day"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-group" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/web2.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>March 18's Memory</h4>
                <p>18.03.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/web2.jpeg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="March 18's Memory"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-group" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/app3.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Breaktime Group Photo</h4>
                <p>28.01.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/app3.jpeg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="Breaktime Group Photo"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-game">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/card1.jpeg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card Game</h4>
                <p>11.02.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/card1.jpeg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="Card Game"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-game" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/card3.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Monopoli Game</h4>
                <p>05.03.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/card3.jpg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="Monopoli Game"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-game" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="{{ asset('assets/img/portfolio/web1.jpg') }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Football Match</h4>
                <p>03.02.2020</p>
                <div>
                  <a href="{{ asset('assets/img/portfolio/web1.jpg') }}" class="venobox link-preview" data-gall="portfolioGallery" title="Football Match"><i class="fas fa-search-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- End Gallery Section -->

  </main><!-- End #main -->

@endsection