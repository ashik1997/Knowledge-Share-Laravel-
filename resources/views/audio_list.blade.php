@extends('layouts.app')

@section('title', 'Audios')

@section('content')
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#" class="active">Audios</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="shop-left">
					<div class="left-title mb-20">
						<h4>Recent books</h4>
					</div>
					<div class="random-area mb-30">
						<div class="product-total-2">
						@foreach(App\Book::where(['status'=>1])->limit(12)->orderBy('id', 'DESC')->get(); as $recent_book)	
							<div class="single-most-product bd mb-18">
								<div class="most-product-img">
									<a href="{{ URL::to( '/book-details/' . $recent_book->id)  }}"><img src="../images/books/{{$recent_book->image1}}" alt="recent_book" /></a>
								</div>
								<div class="most-product-content">
									<h4><a href="{{ URL::to( '/book-details/' . $recent_book->id)  }}">{{$recent_book->title}}</a></h4>
								</div>
							</div>
						@endforeach
						</div>						
					</div>
					<div class="banner-area mb-30">
						<div class="banner-img-2">
							<a href="#"><img src="{{ asset('frontend/img/banner/31.jpg') }}" alt="banner" /></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div class="section-title-5 mb-30">
					<h2>Audio</h2>
				</div>
				<div class="category-image mb-30">
					<a href="#"><img src="{{ asset('frontend/img/banner/32.jpg') }}" alt="banner" /></a>
				</div>

				<!-- tab-area-start -->
				<div class="tab-content">
					<div class="tab-pane active" id="th">
					    <div class="row">
					    	@foreach($audios as $audio)
					        <div class="col-lg-3 col-md-4 col-sm-6">
					            <!-- single-product-start -->
                                <div class="product-wrapper mb-40">
                                    <div class="product-img">
                                        <a href="{{ URL::to( '/audio-details/' . $audio->id) }}">
                                            <img src="../images/audios/{{$audio->image}}" alt="audio" class="primary" />
                                        </a>
                                    </div>
                                    <div class="product-details text-center">
					                      <div class="product-rating">
					                          <h4><a href="{{ URL::to( '/audio-details/' . $audio->id) }}">{{$audio->title}}</a></h4>
					                      </div>
					                      <h6><a href="{{ URL::to( '/book-details/' . $audio->id) }}">{{$audio->sub_title}}</a></h6>
					                </div>
                                </div>
                                <!-- single-product-end -->
					        </div>
							@endforeach
					    </div>
					</div>
					<div class="tab-pane fade" id="list">
						<!-- single-shop-start -->
						<div class="single-shop mb-30">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="product-wrapper-2">
										<div class="product-img">
											<a href="#">
												<img src="{{ asset('frontend/img/product/3.jpg') }}" alt="audio" class="primary" />
											</a>
										</div>	
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="product-wrapper-content">
										<div class="product-details">
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
											<p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare,...											</p>
										</div>
										<div class="product-link">
											<div class="product-button">
												<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="add-to-link">
                                                <ul>
                                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- single-shop-end -->
						<!-- single-shop-start -->
						<div class="single-shop mb-30">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="product-wrapper-2">
										<div class="product-img">
											<a href="#">
												<img src="{{ asset('frontend/img/product/18.jpg') }}" alt="audio" class="primary" />
											</a>
										</div>	
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="product-wrapper-content">
										<div class="product-details">
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
											<p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare,...											</p>
										</div>
										<div class="product-link">
											<div class="product-button">
												<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="add-to-link">
                                                <ul>
                                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- single-shop-end -->
						<!-- single-shop-start -->
						<div class="single-shop mb-30">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="product-wrapper-2">
										<div class="product-img">
											<a href="#">
												<img src="{{ asset('frontend/img/product/10.jpg') }}" alt="audio" class="primary" />
											</a>
										</div>	
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="product-wrapper-content">
										<div class="product-details">
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
											<p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare,...											</p>
										</div>
										<div class="product-link">
											<div class="product-button">
												<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="add-to-link">
                                                <ul>
                                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- single-shop-end -->
						<!-- single-shop-start -->
						<div class="single-shop mb-30">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="product-wrapper-2">
										<div class="product-img">
											<a href="#">
												<img src="{{ asset('frontend/img/product/5.jpg') }}" alt="audio" class="primary" />
											</a>
										</div>	
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="product-wrapper-content">
										<div class="product-details">
											<div class="product-rating">
												<ul>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
												</ul>
											</div>
											<h4><a href="#">Set of Sprite Yoga Straps</a></h4>
											<div class="product-price">
												<ul>
													<li> <span>Starting at</span>$34.00</li>
												</ul>
											</div>
											<p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare,...											</p>
										</div>
										<div class="product-link">
											<div class="product-button">
												<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="add-to-link">
                                                <ul>
                                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- single-shop-end -->
						<!-- single-shop-start -->
						<div class="single-shop">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="product-wrapper-2">
										<div class="product-img">
											<a href="#">
												<img src="{{ asset('frontend/img/product/19.jpg') }}" alt="audio" class="primary" />
											</a>
										</div>	
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<div class="product-wrapper-content">
										<div class="product-details">
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
													<li>$32.00</li>
												</ul>
											</div>
											<p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare,...											</p>
										</div>
										<div class="product-link">
											<div class="product-button">
												<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="add-to-link">
                                                <ul>
                                                    <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- single-shop-end -->
					</div>
				</div>
				<!-- tab-area-end -->
				<!-- pagination-area-start -->
				<div class="pagination-area mt-50">
					<div class="list-page-2">
						<!-- <p>Items 1-9 of 11</p> -->
					</div>
					<div class="page-number">
						<ul>
							<!-- pagination -->
				    		{{ $audios->links() }}
						</ul>
					</div>
				</div>
				<!-- pagination-area-end -->
			</div>
		</div>
	</div>
</div>
<!-- shop-main-area-end -->
@endsection
