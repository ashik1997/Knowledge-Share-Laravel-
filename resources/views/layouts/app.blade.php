<!doctype html>
<html class="no-js" lang="en">
    
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>E-Library - @yield('title')</title>
  <meta name="description" content="E-Library">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png') }}">

  <!-- all css here -->
  <!-- bootstrap v3.3.6 css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <!-- animate css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
  <!-- meanmenu css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.min.css') }}">
  <!-- owl.carousel css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
  <!-- font-awesome css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
  <!-- flexslider.css-->
  <link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css') }}">
  <!-- chosen.min.css-->
  <link rel="stylesheet" href="{{ asset('frontend/css/chosen.min.css') }}">
  <!-- style css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <!-- responsive css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
  <!-- modernizr css -->
  <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
  <!-- header-area-start --> 
  <header>
    <!-- header-mid-area-start -->
    <div class="header-mid-area ptb-40">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="header-search">
              <form action="{{ route('search') }}" method="get">
                <input type="text" name="q" placeholder="Search entire keyword here..." />
                <!-- <a href="#"><i class="fa fa-search"></i></a> -->
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="logo-area text-center logo-xs-mrg">
              @if(Route::current()->getName() == 'book.category' or Route::current()->getName() == 'book.details' or Route::current()->getName() == 'blog.details' or Route::current()->getName() == 'audio.details' or Route::current()->getName() == 'video.details' or Route::current()->getName() == 'blog.details') <a href="/"><img src="../frontend/img/logo/logo.png"></a> @else <a href="/"><img src="frontend/img/logo/logo.png"></a> @endif
              
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
            <div class="account-area text-right">
              <ul>
                 <!-- Authentication Links -->
                  @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                    </li>
                    @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                    @endif
                  @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">{{ __('My Account') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </div>
                    </li>
                  @endguest

              </ul>
            </div>
          </div>
          <!-- <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
            <div class="logo-area text-center logo-xs-mrg">
              <a href="index.html"><img src="{{ asset('frontend/img/logo/logo.png') }}" alt="logo" /></a>
            </div>
          </div> -->
          <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="my-cart">
              <ul>
                <li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
                  <span>2</span>
                  <div class="mini-cart-sub">
                    <div class="cart-product">
                      <div class="single-cart">
                        <div class="cart-img">
                          <a href="#"><img src="{{ asset('frontend/img/product/1.jpg')}}" alt="book" /></a>
                        </div>
                        <div class="cart-info">
                          <h5><a href="#">Joust Duffle Bag</a></h5>
                          <p>1 x £60.00</p>
                        </div>
                        <div class="cart-icon">
                            <a href="#"><i class="fa fa-remove"></i></a>
                        </div>
                      </div>
                      <div class="single-cart">
                        <div class="cart-img">
                          <a href="#"><img src="{{ asset('frontend/img/product/3.jpg')}}" alt="book" /></a>
                        </div>
                        <div class="cart-info">
                          <h5><a href="#">Chaz Kangeroo Hoodie</a></h5>
                          <p>1 x £52.00</p>
                        </div>
                        <div class="cart-icon">
                                                      <a href="#"><i class="fa fa-remove"></i></a>
                                                  </div>
                      </div>
                    </div>
                    <div class="cart-totals">
                      <h5>Total <span>£12.00</span></h5>
                    </div>
                    <div class="cart-bottom">
                      <a class="view-cart" href="cart.html">view cart</a>
                      <a href="checkout.html">Check out</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- header-mid-area-end -->
    <!-- main-menu-area-start -->
    <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="menu-area">
              <nav>
                <ul>
                  <li class="@if(Route::current()->getName() == 'home') active @endif"><a href="{{route('home')}}">Home</a></li>
                  <!-- !! $categories_menu !! -->
                  @foreach(App\Category::where(['parent_id'=>0])->get() as $category)
                  <li><a href="<?php print '/book/'.$category->id; ?>">{{ $category->name }}<i class="fa fa-angle-down"></i></a>
                    <div class="mega-menu">
                      @foreach(App\Category::where(['parent_id'=>$category->id])->get() as $sub_category)
                      <span>
                      <a href="<?php print '/book/'.$sub_category->id; ?>">{{ $sub_category->name }}</a>
                      </span>
                      @endforeach
                    </div>
                    @endforeach
                  </li>
                  <!-- <li><a href="product-details.html">Audio books<i class="fa fa-angle-down"></i></a>
                    <div class="mega-menu">
                      <span>
                        <a href="#" class="title">Shirts</a>
                        <a href="shop.html">Tops & Tees</a>
                        <a href="shop.html">Sweaters </a>
                        <a href="shop.html">Hoodies</a>
                        <a href="shop.html">Jackets & Coats</a>
                      </span>
                      <span>
                        <a href="#" class="title">Tops & Tees</a>
                        <a href="shop.html">Long Sleeve </a>
                        <a href="shop.html">Short Sleeve</a>
                        <a href="shop.html">Polo Short Sleeve</a>
                        <a href="shop.html">Sleeveless</a>
                      </span>
                      <span>
                        <a href="#" class="title">Jackets</a>
                        <a href="shop.html">Sweaters</a>
                        <a href="shop.html">Hoodies</a>
                        <a href="shop.html">Wedges</a>
                        <a href="shop.html">Vests</a>
                      </span>
                      <span>
                        <a href="#" class="title">Jeans Pants</a>
                        <a href="shop.html">Polo Short Sleeve</a>
                        <a href="shop.html">Sleeveless</a>
                        <a href="shop.html">Graphic T-Shirts</a>
                        <a href="shop.html">Hoodies</a>
                      </span>
                    </div>
                  </li>
                  <li><a href="product-details.html">children’s books<i class="fa fa-angle-down"></i></a>
                    <div class="mega-menu mega-menu-2">
                      <span>
                        <a href="#" class="title">Tops</a>
                        <a href="shop.html">Shirts</a>
                        <a href="shop.html">Florals</a>
                        <a href="shop.html">Crochet</a>
                        <a href="shop.html">Stripes</a>
                      </span>
                      <span>
                        <a href="#" class="title">Bottoms</a>
                        <a href="shop.html">Shorts</a>
                        <a href="shop.html">Dresses</a>
                        <a href="shop.html">Trousers</a>
                        <a href="shop.html">Jeans</a>
                      </span>
                      <span>
                        <a href="#" class="title">Shoes</a>
                        <a href="shop.html">Heeled sandals</a>
                        <a href="shop.html">Flat sandals</a>
                        <a href="shop.html">Wedges</a>
                        <a href="shop.html">Ankle boots</a>
                      </span>
                    </div>
                  </li> -->
                  <li class="@if(Route::current()->getName() == 'audio') active @endif"><a href="{{route('audio')}}">Audio</a></li>
                  <li class="@if(Route::current()->getName() == 'video') active @endif"><a href="{{route('video')}}">Video</a></li>
                  <li class="@if(Route::current()->getName() == 'blog') active @endif"><a href="{{route('blog')}}">blog</a></li>
                  <!-- <li><a href="#">pages<i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu sub-menu-2">
                      <ul>
                        <li><a href="shop.html">shop</a></li>
                        <li><a href="product-details.html">product-details</a></li>
                        <li><a href="blog.html">blog</a></li>
                        <li><a href="blog-details.html">blog-details</a></li>
                        <li><a href="contact.html">contact</a></li>
                        <li><a href="about.html">about</a></li>
                        <li><a href="login.html">login</a></li>
                        <li><a href="register.html">register</a></li>
                        <li><a href="cart.html">cart</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="wishlist.html">wishlist</a></li>
                        <li><a href="404.html">404 Page</a></li>
                      </ul>
                    </div>
                  </li> -->
                </ul>
              </nav>
            </div>
            <!-- <div class="safe-area">
              <a href="product-details.html">sales off</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- main-menu-area-end -->
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area hidden-md hidden-lg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="mobile-menu">
              <nav id="mobile-menu-active">
                <ul id="nav">
                  <li class="@if(Route::current()->getName() == 'home') active @endif"><a href="{{route('home')}}">Home</a></li>
                  <!-- !! $categories_menu !! -->
                  @foreach(App\Category::where(['parent_id'=>0])->get() as $category)
                  <li><a href="<?php print '/book/'.$category->id; ?>">{{ $category->name }}<i class="fa fa-angle-down"></i></a>
                    <div class="mega-menu">
                      @foreach(App\Category::where(['parent_id'=>$category->id])->get() as $sub_category)
                      <span>
                      <a href="<?php print '/book/'.$sub_category->id; ?>">{{ $sub_category->name }}</a>
                      </span>
                      @endforeach
                    </div>
                    @endforeach
                  </li>
                  <li class="@if(Route::current()->getName() == 'audio') active @endif"><a href="{{route('audio')}}">Audio</a></li>
                  <li class="@if(Route::current()->getName() == 'video') active @endif"><a href="{{route('video')}}">Video</a></li>
                  <li class="@if(Route::current()->getName() == 'blog') active @endif"><a href="{{route('blog')}}">blog</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- mobile-menu-area-end -->
  </header>
  <!-- header-area-end -->
  <!-- main-content-start -->
  @yield('content')
  <!-- main-content-end -->
  <!-- footer-area-start -->
  <footer>
    <!-- footer-mid-start -->
    <div class="footer-mid ptb-50">
      <div class="container">
        <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer mrg-sm">
                    <div class="footer-title mb-20">
                        <h3>About us</h3>
                    </div>
                    <div class="footer-contact">
                        <p class="adress">
                          It's an online library where everyone can share knowledge. We have brought you this new online platform for people to read books for free. Read the book yourself and let others read the book. Education is the backbone of the nation. The country where the higher the education rate, the better.
                        </p>
                    </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="link-follow">
                  <ul>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                    <li class="hidden-sm"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                    <li class="hidden-sm"><a href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
        </div>
      </div>
    </div>
    <!-- footer-mid-end -->
    <!-- footer-bottom-start -->
    <div class="footer-bottom">
      <div class="container">
        <div class="row bt-2">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="copy-right-area">
              <p>Copyright ©<a href="#">Knowladge share</a>. All Right Reserved.</p>
            </div>
          </div>
          <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="payment-img text-right">
              <a href="#"><img src="{{ asset('frontend/img/1.png') }}" alt="payment" /></a>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- footer-bottom-end -->
  </footer>
  <!-- footer-area-end -->



  <!-- all js here -->
  <!-- jquery latest version -->
      <script src="{{ asset('frontend/js/vendor/jquery-1.12.0.min.js') }}"></script>
  <!-- bootstrap js -->
      <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <!-- owl.carousel js -->
      <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <!-- meanmenu js -->
      <script src="{{ asset('frontend/js/jquery.meanmenu.js') }}"></script>
  <!-- wow js -->
      <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
  <!-- jquery.parallax-1.1.3.js -->
      <script src="{{ asset('frontend/js/jquery.parallax-1.1.3.js') }}"></script>
  <!-- jquery.countdown.min.js -->
      <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
  <!-- jquery.flexslider.js -->
      <script src="{{ asset('frontend/js/jquery.flexslider.js') }}"></script>
  <!-- chosen.jquery.min.js -->
      <script src="{{ asset('frontend/js/chosen.jquery.min.js') }}"></script>
  <!-- jquery.counterup.min.js -->
      <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
  <!-- waypoints.min.js -->
      <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
  <!-- plugins js -->
      <script src="{{ asset('frontend/js/plugins.js') }}"></script>
  <!-- main js -->
      <script src="{{ asset('frontend/js/main.js') }}"></script>
  </body>
</html>