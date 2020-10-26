@extends('layouts.app')

@section('title', 'Books')

@section('content')
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#" class="active">books</a></li>
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
						<h4>Recent post</h4>
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
					<h2>@if(isset($category_name)){{ $category_name }} @endif Books</h2>
				</div>
				<div class="category-image mb-30">
					<a href="#"><img src="{{ asset('frontend/img/banner/32.jpg') }}" alt="banner" /></a>
				</div>
				
				
				<!-- tab-area-start -->
				<div class="tab-content">
					<div class="tab-pane active" id="th">
					    <div class="row">
					    	@foreach($books as $book)
					        <div class="col-lg-3 col-md-4 col-sm-6">
					            <!-- single-product-start -->
                                <div class="product-wrapper mb-40">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="../images/books/{{$book->image1}}" alt="book" class="primary" />
                                        </a>
                                    </div>
                                    <div class="product-details text-center">
					                      <div class="product-rating">
					                          <h4><a href="{{ URL::to( '/book-details/' . $book->id)  }}">{{$book->title}}</a></h4>
					                      </div>
					                      <h6><a href="{{ URL::to( '/book-details/' . $book->id)  }}">{{$book->sub_title}}</a></h6>
					                </div>
	                            </div>
                                <!-- single-product-end -->
					        </div>
							@endforeach
					    </div>
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
				    		{{ $books->links() }}
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
