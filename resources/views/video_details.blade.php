@extends('layouts.app')

@section('title', 'Video details')

@section('content')
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#" class="active">video-details</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs-area-end -->
<!-- product-main-area-start -->
<div class="product-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<!-- product-main-area-start -->
				<div class="product-main-area">
					<div class="row">
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="product-info-main">
								<div class="page-title">
									<h1>{{$video->title}}</h1>
									<h5>{{$video->sub_title}}</h5>
								</div>
								<div class="youtube-video mb-30">
									{!! $video->video_url !!}
								</div>
								<div class="product-info-stock-sku">
									<span>Author: {{$video->author}}</span><br>
									<span>Posted by: {{ App\User::where(['id'=>$video->posted_by_id])->pluck('name')[0] }}</span><br>
									<div class="product-attribute">
										<span class="value">Post date: {{date('d F,Y', strtotime($video->created_at))}}</span>
									</div>
								</div>
								<br>
								<div class="product-social-links">
									<script>
									  var VUUKLE_CONFIG = {
									    apiKey: 'dae91ce1-f1a5-4245-9880-dd0bd57c4f89',
									    articleId: 'video-{{ $video->id }}',
									  };
									  // ⛔️ DON'T EDIT BELOW THIS LINE
									  (function() {
									    var d = document,
									      s = d.createElement('script');
									    s.src = 'https://cdn.vuukle.com/platform.js';
									    (d.head || d.body).appendChild(s);
									  })();
									</script>
									<div class="product-addto-links">
										<div class='vuukle-powerbar'></div>
									</div>
									<!-- <div class="product-addto-links-text">
									</div> -->
								</div>
							</div>
						</div>
					</div>
					<div id='vuukle-comments'></div>
					<div id='vuukle-emote'></div>
				</div>
				<!-- product-main-area-end -->
				<div class="col-md-12">
	                @if(Session::has('add_review_flash_error'))
	                <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>{!! session('add_review_flash_error') !!} !</strong>
	                </div>
	                @endif
	                @if(Session::has('add_review_flash_success'))
	                <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
	                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                  <strong>{!! session('add_review_flash_success') !!} !</strong>
	                </div>
	                @endif
	                @if ($errors->any())
	                <div class="alert alert-danger alert-dismissible" id="myAlert">
	                  <a href="" class="close">&times;</a>
	                  <ul>
	                  @foreach ($errors->all() as $error)
	                    <li>
	                    <strong>Oh sanp!</strong> {{ $error }}
	                    </li>
	                  @endforeach
	                  </ul>
	                </div>
	                @endif
	            </div>
				<!-- product-info-area-start -->
				<div class="product-info-area mt-80">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="active"><a href="#Details" data-toggle="tab">Details</a></li>
						<li><a href="#Reviews" data-toggle="tab">Reviews {{App\Review::where(['post_id'=>$video->id])->where(['table_name'=>'videos'])->count()}}</a></li>
					</ul>
					<div class="tab-content">
                        <div class="tab-pane active" id="Details">
                            <div class="valu">
                              {!! $video->description !!}
                            </div>
                        </div>
                        <div class="tab-pane" id="Reviews">
                            <div class="valu valu-2">
                                <div class="section-title mb-10 mt-10">
                                    <h2>Customer Reviews</h2>
                                </div>

								<!-- pagination-area-end -->
                                <form action="{{ url('/video-review') }}" method="post">
	                                <div class="review-form">
	                                	{{csrf_field()}}
	                                    <div class="single-form">
	                                        <input type="hidden" name="post_id" value="{{$video->id}}" />
	                                    </div>
	                                    <div class="form-group">
	                                        <label>Summery <sup>*</sup></label>
	                                        <input type="text" name="summery" class="form-control" />
	                                    </div>
	                                    <div class="form-group">
	                                        <label>Review <sup>*</sup></label>
	                                        <textarea name="massage" cols="10" rows="4"  class="form-control"></textarea>
	                                    </div>
	                                </div>
	                                <div class="review-form-button">
	                                    <button type="submit" class="btn btn-success btn-flat" name="submit_review">Submit Review</button>
	                                </div>
                            	</form>
                            	<ul>
                                	@foreach($reviews as $review)	
                                    <li>
                                        <div class="review-left">
                                            <div class="review-details">
                                                <p class="review-author">Review by:<a href="#">{{ App\User::where(['id'=>$review->user_id])->pluck('name')[0] }}</a></p>
                                                <p class="review-date">Posted on: <span>{{date('d F,Y', strtotime($review->created_at))}}</span></p>
                                            </div>
                                            <div class="review-content">
                                                <h4><strong>{{ $review->summery }}</strong></h4>
                                                <h4>{{ $review->review }} </h4>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li>
                                    	{{ $reviews->links() }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>	
				</div>
				<!-- product-info-area-end -->
				<!-- new-book-area-start -->
				<div class="new-book-area mt-60">
					<div class="section-title text-center mb-30">
						<h3>Latest book</h3>
					</div>
					<div class="tab-active-2 owl-carousel">
						@foreach(App\Book::where(['status'=>1])->limit(8)->orderBy('id', 'DESC')->get(); as $latest_book)	
						<!-- single-product-start -->
						<div class="product-wrapper">
							<div class="product-img">
								<a href="{{ URL::to( '/book-details/' . $latest_book->id) }}">
			                        <img src="../images/books/{{$latest_book->image1}}" alt="book" class="primary" />
			                    </a>
							</div>
							<div class="product-details text-center">
			                    <div class="product-rating">
			                        <h4><a href="{{ URL::to( '/book-details/' . $latest_book->id) }}">{{$latest_book->title}}</a></h4>
			                    </div>
			                    <h6><a href="{{ URL::to( '/book-details/' . $latest_book->id)  }}">{{$latest_book->sub_title}}</a></h6>
			                </div>
						</div>
						<!-- single-product-end -->
						@endforeach
					</div>
				</div>
				<!-- new-video-area-start -->
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="shop-left">
					<div class="left-title mb-20">
						<h4>Latest video</h4>
					</div>
					<div class="random-area mb-30">
						<div class="product-total-2">
						@foreach(App\Video::whereNotIn('id', [$video->id])->where(['status'=>1])->limit(8)->orderBy('id', 'DESC')->get(); as $latest_video)	
							<div class="single-most-product bd mb-18">
								<div class="most-product-img">
									<a href="{{ URL::to( '/video-details/' . $latest_video->id)  }}"><img src="../images/videos/{{$latest_video->image}}" alt="latest_video" /></a>
								</div>
								<div class="most-product-content">
									<h4><a href="{{ URL::to( '/video-details/' . $latest_video->id)  }}">{{$latest_video->title}}</a></h4>
								</div>
							</div>
						@endforeach
						</div>
					</div>
					<div class="random-area mb-30">
						<div id='vuukle-newsfeed'></div>
					</div>
					<div class="banner-area mb-30">
						<div class="banner-img-2">
							<a href="#"><img src="{{ asset('frontend/img/banner/33.jpg') }}" alt="banner" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- product-main-area-end -->
@endsection
