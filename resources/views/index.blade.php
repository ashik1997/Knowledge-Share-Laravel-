@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <!-- slider-area-start -->
  <div class="slider-area">
    <div class="slider-active owl-carousel">
      <div class="single-slider pt-125 pb-130 bg-img" style="background-image:url(frontend/img/slider/1.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <div class="slider-content slider-animated-1 text-center">
                  <h1>Knowledge</h1>
                  <h2>Share</h2>
                  <h3>An Online Library Platform</h3>
                  <a href="#">Read Now</a>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="single-slider slider-h1-2 pt-215 pb-100 bg-img" style="background-image:url(frontend/img/slider/2.jpg);">
          <div class="container">
            <div class="slider-content slider-content-2 slider-animated-1">
              <h1>We can help get your</h1>
              <h2>Books Read</h2>
              <h3>and Download</h3>
              <a href="#">Read Now</a>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- slider-area-end -->
  <!-- product-area-start -->
  <div class="product-area pt-95 xs-mb">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title text-center mb-50">
            <h2>New Arrival Books</h2>
            <!-- <p>Browse the collection of our best selling and top interresting products. <br /> ll definitely find what you are looking for..</p> -->
          </div>
        </div>
        <!-- <div class="col-lg-12"> -->
          <!-- tab-menu-start -->
          <!-- <div class="tab-menu mb-40 text-center">
            <ul> -->
              <!-- <li class="active"><a href="#Audiobooks" data-toggle="tab">New Arrival  </a></li> -->
              <!-- <li><a href="#books"  data-toggle="tab">OnSale</a></li>
              <li><a href="#bussiness" data-toggle="tab">Featured Products</a></li> -->
            <!-- </ul>
          </div> -->
          <!-- tab-menu-end -->
        <!-- </div> -->
      </div>
      <!-- tab-area-start -->
      <div class="tab-content">
        <div class="tab-pane active" id="Audiobooks">
          <div class="tab-active owl-carousel">
            @foreach($books as $book)
              <!-- single-product-start -->
              <div class="product-wrapper">
                  <div class="product-img">
                      <a href="{{ URL::to( '/book-details/' . $book->id) }}">
                          <img src="images/books/{{$book->image1}}" alt="book" class="primary" />
                      </a>
                      
                      <div class="product-flag">
                          <ul>
                              <li><span class="sale">new</span> <br></li>
                          </ul>
                      </div>
                  </div>
                  <div class="product-details text-center">
                    <div class="product-rating">
                        <h4><a href="{{ URL::to( '/book-details/' . $book->id) }}">{{$book->title}}</a></h4>
                    </div>
                    <h6><a href="{{ URL::to( '/book-details/' . $book->id)  }}">{{$book->sub_title}}</a></h6>
                  </div>
                    
              </div>
              <!-- single-product-end -->
              @endforeach
          </div>
        </div>
      </div>
      <!-- tab-area-end -->
    </div>
  </div>
  <!-- product-area-end -->
  <!-- banner-area-start -->
  <div class="banner-area-5 mtb-95">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-img-2">
            <a href="#"><img src="{{asset('frontend/img/banner/5.jpg') }}" alt="banner" /></a>
            <div class="banner-text">
              <h3>Contact </h3>
              <h2>for Ads +8801731002123</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- banner-area-end -->
  <!-- bestseller-area-start -->
  <div class="bestseller-area pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
          <div class="bestseller-content">
            <h1>History of Audio Books</h1>
            <!-- <p class="categories">categories:<a href="#">Books</a> , <a href="#">Audiobooks</a></p> -->
            <p style="text-align: justify;">Spoken word recordings first became possible with the invention of the phonograph by Thomas Edison in 1877. "Phonographic books" were one of the original applications envisioned by Edison which would "speak to blind people without effort on their part. The initial words spoken into the phonograph were Edison's recital of "Mary Had a Little Lamb", the first instance of recorded verse. In 1878, a demonstration at the Royal Institution in Britain included "Hey Diddle Diddle, the Cat and the Fiddle" and a line of Tennyson's poetry thus establishing from the very beginning of the technology its association with spoken literature.</p>
            <!-- <div class="social-author">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              </ul>
            </div> -->
          </div>
          <div class="banner-img-2">
            <h4>Recent Post Audio Books</h4>
            <a href="#"><img src="{{asset('frontend/img/banner/6.jpg') }}" alt="banner" /></a>
          </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="">
            
              @foreach(App\Audio::where(['status'=>1])->orderBy('id', 'DESC')->limit(4)->get() as $audio)
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-bestseller mb-25">
                <div class="bestseller-img">
                  <a href="{{ URL::to( '/audio-details/' . $audio->id) }}"><img src="images/audios/{{$audio->image}}" alt="book" /></a>
                </div>
                <div class="bestseller-text text-center">
                  <h4> <a href="{{ URL::to( '/audio-details/' . $audio->id) }}">{{ $audio->title }}</a></h4>
                </div>
              </div>
            </div>
              @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bestseller-area-end -->
  <!-- new-book-area-start -->
  <div class="new-book-area pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title text-center mb-50">
            <h2>Latest Video Books</h2>
            <!-- <p>Browse the collection of our best selling and top interresting products. <br /> ll definitely find what you are looking for..</p> -->
          </div>
        </div>
        <!-- <div class="col-lg-12"> -->
          <!-- tab-menu-start -->
          <!-- <div class="tab-menu mb-40 text-center">
            <ul> -->
              <!-- <li class="active"><a href="#Audiobooks" data-toggle="tab">New Arrival  </a></li> -->
              <!-- <li><a href="#books"  data-toggle="tab">OnSale</a></li>
              <li><a href="#bussiness" data-toggle="tab">Featured Products</a></li> -->
            <!-- </ul>
          </div> -->
          <!-- tab-menu-end -->
        <!-- </div> -->
      </div>
      <!-- tab-area-start -->
      <div class="tab-content">
        <div class="tab-pane active" id="Audiobooks">
          <div class="tab-active owl-carousel">
            @foreach(App\Video::where(['status'=>1])->limit(8)->get() as $video)
              <!-- single-product-start -->
              <div class="product-wrapper">
                  <div class="product-img">
                      <a href="{{ URL::to( '/video-details/' . $video->id)  }}">
                          <img src="../images/videos/{{$video->image}}" alt="video" class="primary" />
                      </a>
                  </div>
                  <div class="product-details text-center">
                        <div class="product-rating">
                            <h4><a href="{{ URL::to( '/video-details/' . $video->id) }}">{{$video->title}}</a></h4>
                        </div>
                        <h6><a href="{{ URL::to( '/video-details/' . $video->id) }}">{{$video->sub_title}}</a></h6>
                  </div>
              </div>
              <!-- single-product-end -->
              @endforeach
          </div>
        </div>
      </div>
      <!-- tab-area-end -->
    </div>
    
  </div>
  <!-- new-book-area-start -->
  <!-- banner-static-area-start -->
  <div class="banner-static-area bg ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="banner-shadow-hover xs-mb">
            <a href="#"><img src="{{asset('frontend/img/banner/8.jpg') }}" alt="banner" /></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="banner-shadow-hover">
            <a href="#"><img src="{{asset('frontend/img/banner/29.jpg') }}" alt="banner" /></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- banner-static-area-end -->
  <!-- most-product-area-start -->
  <!-- <div class="most-product-area pt-90 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-mb">
          <div class="section-title-2 mb-30">
            <h3>Book</h3>
          </div>
          <div class="product-active-2 owl-carousel">
            <div class="product-total-2">
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/20.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Endeavor Daytrip</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$33.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/21.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Savvy Shoulder Tote</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$35.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/22.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Compete Track Tote</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$35.00</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-total-2">
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/23.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Voyage Yoga Bag</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$33.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/24.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Impulse Duffle</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$70.00</li>
                      <li class="old-price">$74.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/22.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Fusion Backpack</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$59.00</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-mb">
          <div class="section-title-2 mb-30">
            <h3>Audio books </h3>
          </div>
          <div class="product-active-2 owl-carousel">
            <div class="product-total-2">
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/23.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Voyage Yoga Bag</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$33.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/24.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Impulse Duffle</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$70.00</li>
                      <li class="old-price">$74.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/26.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Driven Backpack1</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$40.00</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-total-2">
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/20.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Endeavor Daytrip</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$33.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/21.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Savvy Shoulder Tote</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$35.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/22.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Compete Track Tote</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$35.00</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <div class="section-title-2 mb-30">
            <h3>children’s books</h3>
          </div>
          <div class="product-active-2 owl-carousel">
            <div class="product-total-2">
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/27.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Crown Summit</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$36.00</li>
                      <li class="old-price">$38.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/28.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Driven Backpack</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$34.00</li>
                      <li class="old-price">$36.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/29.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Endeavor Daytrip</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$33.00</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-total-2">
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/23.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Voyage Yoga Bag</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$30.00</li>
                      <li class="old-price">$33.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product bd mb-18">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/24.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Impulse Duffle</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$70.00</li>
                      <li class="old-price">$74.00</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="single-most-product">
                <div class="most-product-img">
                  <a href="#"><img src="{{ asset('frontend/img/product/22.jpg') }}" alt="book" /></a>
                </div>
                <div class="most-product-content">
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
                  <h4><a href="#">Fusion Backpack</a></h4>
                  <div class="product-price">
                    <ul>
                      <li>$59.00</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="block-newsletter">
            <h2>Sign up for send newsletter</h2>
            <p>You can be always up to date with our company new!</p>
            <form action="#">
              <input type="text" placeholder="Enter your email address" />
            </form>
            <a href="#">Send Email</a>
          </div>
        </div>
      </div>
    </div>
  </div>
 -->  <!-- most-product-area-end -->
  <!-- testimonial-area-start -->
  <div class="testimonial-area ptb-100 bg">
    <div class="container">
      <div class="row">
        <div class="testimonial-active owl-carousel">
          <div class="col-lg-12">
            <div class="single-testimonial text-center">
              <div class="testimonial-img">
                <a href="#"><i class="fa fa-quote-right"></i></a>
              </div>
              <div class="testimonial-text">
                <p>You give me an educated mother, I will give you the gift of an educated nation.....!!</p>
                <a href="#"> Napoleon </a>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="single-testimonial text-center">
              <div class="testimonial-img">
                <a href="#"><i class="fa fa-quote-right"></i></a>
              </div>
              <div class="testimonial-text">
                <p> Education is the backbone of the nation......!!</p>
                <a href="#">Dr Nirmal Singh</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- testimonial-area-end -->
  <!-- recent-post-area-start -->
  <div class="recent-post-area pt-95 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title text-center mb-30 section-title-res">
            <h2>Latest from our blog</h2>
          </div>
        </div>
        <div class="post-active owl-carousel text-center">
          @foreach(App\Blog::orderBy('id', 'DESC')->get(); as $blog)
          <div class="col-lg-12">
            <div class="single-post">
              <div class="post-img">
                <a href="{{ URL::to( '/blog-details/' . $blog->id) }}"><img src="images/blog/{{$blog->image}}" alt="post" /></a>
                <div class="blog-date-time">
                    <span class="day-time">{{date('d', strtotime($blog->created_at))}}</span>
                    <span class="moth-time">{{date('F', strtotime($blog->created_at))}}</span>
                </div>
              </div>
              <div class="post-content" style="max-height: 200px;">
                <h3><a href="{{ URL::to( '/blog-details/' . $blog->id) }}">{{$blog->title}}</a></h3>
                <span class="meta-author"> {{ App\User::where(['id'=>$blog->posted_by_id])->pluck('name')[0] }} </span>
                {!! $blog->description !!}
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- recent-post-area-end -->
@endsection
