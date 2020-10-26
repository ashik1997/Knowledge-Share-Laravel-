@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#" class="active">blog</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs-area-end -->
<!-- blog-main-area-start -->
<div class="blog-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="shop-left">
					<div class="left-title mb-20">
						<h4>Recent books</h4>
					</div>
					<div class="random-area mb-30">
						<div class="product-total-2">
						@foreach(App\Book::where(['status'=>1])->limit(20)->orderBy('id', 'DESC')->get(); as $recent_book)	
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
					<!-- <div class="banner-area mb-30">
						<div class="banner-img-2">
							<a href="#"><img src="{{ asset('frontend/img/banner/31.jpg') }}" alt="banner" /></a>
						</div>
					</div> -->
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div class="blog-main-wrapper">
					@foreach($blogs as $blog)
					<div class="single-blog-post">
						<div class="author-destils mb-30">
							<div class="author-left">
								<div class="author-img">
									<a href=""><img src="images/users/{{ App\User::where(['id'=>$blog->posted_by_id])->pluck('image')[0] }}" alt="man" /></a>
								</div>
								<div class="author-description">
									<p>Posted by: 
										<a href="#"><span>{{ App\User::where(['id'=>$blog->posted_by_id])->pluck('name')[0] }}</span>
									</p>
									<span>{{date('d F,Y', strtotime($blog->created_at))}}</span>
								</div>
							</div>
							<!-- <div class="author-right">
								<span>Share this:</span>
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div> -->
						</div>
						<div class="blog-img mb-30">
							<a href="{{ URL::to( '/blog-details/' . $blog->id)  }}"><img src="../images/blog/{{$blog->image}}" alt="blog" /></a>
						</div>
						<div class="single-blog-content">
							<div class="single-blog-title">
								<h3><a href="{{ URL::to( '/blog-details/' . $blog->id)  }}">{{$blog->title}}</a></h3>
							</div>
							<div class="blog-single-content">
								<p>{!!$blog->description!!}</p>
							</div>
						</div>
						<div class="blog-comment-readmore">
							<div class="blog-readmore">
								<a href="{{ URL::to( '/blog-details/' . $blog->id)  }}">Read more<i class="fa fa-long-arrow-right"></i></a>
							</div>
							<div class="blog-com">
								<a href="{{ URL::to( '/blog-details/' . $blog->id)  }}">{{App\Review::where(['post_id'=>$blog->id])->where(['table_name'=>'blogs'])->count()}} comments</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog-main-area-end -->
@endsection
