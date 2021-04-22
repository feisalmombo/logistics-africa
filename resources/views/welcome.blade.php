<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Logistics Africa | Homepage</title>
    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('temp/assets/css/style-liberty.css')}}">
    <link rel="stylesheet" href="{{asset('temp/assets/css/style-starter.css')}}">
  </head>
  <body>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>

<meta name="robots" content="noindex">
<body>

<div class="w3l-bootstrap-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light p-2">
      <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><strong style="color:#2B3483">Logistics Africa</strong><strong style="color:#E58225">.</strong></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <div class="form-inline">
          {{--  <a href="{{ url('/about') }}" class="help mr-4">About</a>  --}}
          </div>

          <div class="form-inline">
          <a href="{{url('/contact/all/contacts/create')}}" class="about mr-4">Contact</a>
          </div>

          <div class="form-inline">
            <a href="{{ route('login') }}" class="btn btn-warning sign" style="border-radius: 90px;"><strong style="color:white;">Sign in</strong></a>
          </div>

        </div>
      </div>
    </nav>
</div>

<section class="w3l-blog mt-5">
  <div class="text-element-9 py-5 mt-5">
    <div class="display-ad" style="margin: 8px auto; display: block; text-align:center;">
      <!---728x90--->

    </div>
    <div class="container py-lg-3">
      <div class="page-title text-center mx-auto">
        <h3 class="head mb-lg-5 mb-4">Blog Posts</h3>
      </div>
      <div class="row grid-text-9">
        <div class="col-md-8">
            {{-- This for post to the welcome page --}}
            @if (count($blogposts) > 0)
            @foreach ($blogposts as $blogpost)
          <div class="row">
          <a href="{{ url('/blog/post/' .$blogpost->id) }}" class="col-lg-12 blog-article-post">
              <div class="blog-post d-flex flex-wrap align-content-between">
                <div class="post-content">
                <img src="{{ asset('storage/'.$blogpost->post_image_path) }}" class="img-fluid" alt="blog-post-image" />
                  <p class="sub-para my-3">{{ $blogpost->category_name }}</p>
                  <h4 class="text-head-text-9">{{$blogpost->title}}</h4>
                  <p class="my-3">{{ str_limit($blogpost->post_description, 200) }}</p>
                  {{-- <a href="blog-single.html" class="read-more-btn btn mt-1">Read More</a> --}}
                  <a href="{{ url('/blog/post/' .$blogpost->id) }}" type="button" class="btn btn-primary" style="float: left">Read More</a>
                </div>
                <ul class="blog-author-date mt-4 d-flex justify-content-between align-items-end">
                  <li class="author">By {{ $blogpost->first_name }} {{ $blogpost->last_name }}</li>
                  <li>{{date("F jS, Y", strtotime($blogpost->created_at))}}</li>
                </ul>
              </div>
            </a>
          </div>
        @endforeach
        @endif
        <br>
          {{-- For All post to the page --}}
          <nav aria-label="Page navigation example">
          <a href="{{ url('/view/all/posts') }}" type="button" class="btn btn-primary" style="float: left">View All</a>
          </nav>
        </div>


        <div class="col-md-4 left-text-9 mt-md-5 mt-5 pl-md-4">
            {{-- This is for Search button --}}
          <div class="blog-search">
            <form action="#" method="GET" class="d-flex search-form">
              <input type="search" class="form-control" placeholder="Search..." name="search" required="required">
              <button type="submit" class="btn search-btn"><span class="fa fa-search"></span></button>
            </form>
          </div>
          <br>
          @include('msgs.success')

          {{-- This is for Subscriber to our NewsLetter --}}
          <div class="blog-subscribe p-3 mt-5">
            <h5>Subscribe to Blog</h5>

            <form action="{{ url('/subscriber-email') }}" method="POST" class="subscribe-form">
                {{ csrf_field() }}

              <input type="email" name="email" id="email"  class="form-control subscribe-field mt-3 mb-2" placeholder="Email Address" required="required">
              <button type="submit" class="btn btn-primary btn-theme">Subscribe</button>
            </form>
          </div>

          <div class="left-top-9 mt-5">
            <h6 class="heading-small-text-9 mb-3">Popular Post</h6>
            @if (count($blogposts) > 0)
            @foreach ($blogposts as $blogpost)
            <a href="{{ url('/blog/post/' .$blogpost->id) }}" class="p-post d-block py-2">
              <h6 class="text-left-inner-9">{{$blogpost->title}}</h6>
              <span class="sub-inner-text-9">{{date("F jS, Y", strtotime($blogpost->created_at))}}</span>
            </a>
          @endforeach
          @endif
          </div>
          <div class="categories mt-5">
            <h6 class="heading-small-text-9">Categories</h6>
            @if (count($blogposts) > 0)
            @foreach ($blogposts as $blogpost)
            <ul>
              <li>
                <a href="{{ url('/blog/post/' .$blogpost->id) }}" class="">{{ $blogpost->category_name }}</a>
              </li>
            </ul>
            @endforeach
            @endif
          </div>

        </div>
      </div>
    </div>
    <div class="display-ad" style="margin: 8px auto; display: block; text-align:center;">
      <!---728x90--->
    </div>
  </div>
</section>
      <!-- footer-28 block -->
      <section class="w3l-market-footer">
        <footer class="footer-28">
          <div class="footer-bg-layer">
            <div class="container py-lg-3">
              <div class="row footer-top-28">
                <div class="col-md-6 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Contact information</h6>
                  <ul>
                    <li>
                      <p><strong>Address</strong> : Innovation Hub255
                        1st Floor, House 40
                        Block 10, Bagamoyo Road
                        14107 - Dar es Salaam, Tanzania.</p>
                    </li>
                    <li>
                      <p><strong>Phone</strong> : <a href="tel:+404-11-22-89">+255 684 456 287</a></p>
                    </li>
                    <li>
                      <p><strong>Email</strong> : <a href="mailto:example@mail.com">info@getpesa.co.tz</a></p>
                    </li>
                  </ul>

                  <div class="main-social-footer-28 mt-3">
                    <ul class="social-icons">
                      <li class="facebook">
                        <a href="https://www.facebook.com/GetPesaTZ/" target="_blank" title="Facebook">
                          <span class="fa fa-facebook" aria-hidden="true"></span>
                        </a>
                      </li>
                      <li class="twitter">
                        <a href="https://twitter.com/GetPesaTZ" target="_blank" title="Twitter">
                          <span class="fa fa-twitter" aria-hidden="true"></span>
                        </a>
                      </li>
                      <li class="linkedin">
                        <a href="https://www.linkedin.com/company/getpesa" target="_blank">
                          <span class="fa fa-linkedin" aria-hidden="true"></span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4 footer-list-28 mt-5">
                      <h6 class="footer-title-28">Company</h6>
                      <ul>
                        <li><a href="{{ url('/contact/all/contacts/create')}}">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4 footer-list-28 mt-5">
                      <h6 class="footer-title-28">Quick Links</h6>
                      <ul>
                      <li><a href="{{ route('login') }}">Sign in</a></li>
                        <li><a href="#">Learning Center</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4 footer-list-28 mt-5">
                      <h6 class="footer-title-28">Products</h6>
                      <ul>
                        <li><a href="http://compare.getpesa.co.tz/" target="_blank">Logistics Africa</a></li>
                        <li><a href="https://getpesa.co.tz/" target="_blank">GetPesa</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
              <div class="container">
                <p class="copy-footer-28 text-center"> &copy; {{ date('Y') }} Logistics Africa. All Rights Reserved. A Product by <a
                  href="https://getpesa.co.tz/" target="_blank">GetPesa Limited</a></p>
              </div>
            </div>
          </div>
        </footer>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
          &#10548;
        </button>
        <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
            scrollFunction()
          };

          function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              document.getElementById("movetop").style.display = "block";
            } else {
              document.getElementById("movetop").style.display = "none";
            }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
        </script>
        <!-- /move top -->
      </section>
      <!-- //footer-28 block -->

      <!-- jQuery, Bootstrap JS -->
    <script src="{{asset('temp/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('temp/assets/js/bootstrap.min.js')}}"></script>

      <!-- Template JavaScript -->

    <script src="{{asset('temp/assets/js/owl.carousel.js')}}"></script>

      <!-- script for owlcarousel -->
      <script>
        $(document).ready(function () {
          $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
              0: {
                items: 1,
                nav: false
              },
              480: {
                items: 1,
                nav: false
              },
              667: {
                items: 1,
                nav: true
              },
              1000: {
                items: 1,
                nav: true
              }
            }
          })
        })
      </script>
      <!-- //script for owlcarousel -->

      <!-- disable body scroll which navbar is in active -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
      <!-- disable body scroll which navbar is in active -->

    <script src="{{asset('temp/assets/js/jquery.magnific-popup.min.js')}}"></script>
      <script>
        $(document).ready(function () {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });

          $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
          });
        });
      </script>

</body>
</html>
