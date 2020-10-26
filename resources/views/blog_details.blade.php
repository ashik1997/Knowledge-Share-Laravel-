@extends('layouts.app')

@section('title', 'Blog details')

@section('content')
<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumbs-menu">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#" class="active">blog-details</a></li>
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
				<div class="single-blog mb-50">
					<div class="blog-left-title">
						<h3>Recent Blog Posts</h3>
					</div>
					<div class="blog-side-menu">
						<ul>
							@foreach(App\Blog::whereNotIn('id', [$blog->id])->where(['status'=>1])->limit(12)->orderBy('id', 'DESC')->get(); as $recent_blog)
							<li><a href="{{ URL::to( '/blog-details/' . $blog->id)  }}">{{ $recent_blog->title  }}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="blog-side-menu">
						<div id='vuukle-newsfeed'></div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div class="blog-main-wrapper">
					<div class="author-destils mb-30">
						<div class="author-left">
							<div class="author-img">
								<a href="#"><img src="../images/users/{{ App\User::where(['id'=>$blog->posted_by_id])->pluck('image')[0] }}" alt="man" /></a>
							</div>
							<div class="author-description">
								<p>Posted by: {{ App\User::where(['id'=>$blog->posted_by_id])->pluck('name')[0] }}
								</p>
								<span>{{date('d F,Y', strtotime($blog->created_at))}}</span>
							</div>
						</div>
						<script>
						  var VUUKLE_CONFIG = {
						    apiKey: 'dae91ce1-f1a5-4245-9880-dd0bd57c4f89',
						    articleId: 'blog-{{ $blog->id }}',
						  };
						  // ⛔️ DON'T EDIT BELOW THIS LINE
						  (function() {
						    var d = document,
						      s = d.createElement('script');
						    s.src = 'https://cdn.vuukle.com/platform.js';
						    (d.head || d.body).appendChild(s);
						  })();
						</script>
						<div class="author-right">
							<!-- <span>Share this:</span> -->
							<ul>
								<li><a onclick="PrintElem('myDivToPrint')"><i class="fa fa-print"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="blog-img mb-30">
						<img src="../images/blog/{{$blog->image}}" alt="blog" />
					</div>
					<div class="single-blog-content" id="myDivToPrint">
						<div class="single-blog-title">
							<h3>{{$blog->title}}</h3>
						</div>
						<div class="blog-single-content">
						{!! $blog->description !!}
						</div>
					</div>
					
					<div class="sharing-post mt-20">
						<div class='vuukle-powerbar'></div>
						<div id='vuukle-comments'></div>
						<div id='vuukle-emote'></div>
						<!-- <div class="share-text">
							<span>Share this post</span>
						</div>
						<div class="share-icon">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div> -->
					</div>
					<div class="comment-title-wrap mt-30">
						<h3>{{App\Review::where(['post_id'=>$blog->id])->where(['table_name'=>'blogs'])->count()}} Comments</h3>
					</div>
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
					<div class="comment-input mt-40">
						<form action="{{ url('/blog-review') }}" method="post">
	                        <div class="review-form">
	                        	{{csrf_field()}}
	                            <div class="single-form">
	                                <input type="hidden" name="post_id" value="{{$blog->id}}" />
	                            </div>
	                            <div class="form-group">
	                                <label>Summery <sup>*</sup></label>
	                                <input type="text" name="summery" class="form-control" placeholder="Write short summery......" />
	                            </div>
	                            <div class="form-group">
	                                <label>Review <sup>*</sup></label>
	                                <textarea name="massage" cols="10" rows="4"  class="form-control" placeholder="Write your review....."></textarea>
	                            </div>
	                        </div>
	                        <div class="review-form-button">
	                            <button type="submit" class="btn btn-success btn-flat" name="submit_review">Post Comment</button>
	                        </div>
	                	</form>
					</div>
					<div class="comment-reply-wrap mt-50">
						<ul>
							@foreach($reviews as $review)
							<li>
								<div class="public-comment">
									<div class="comment-img">
										<a href="#"><img src="{{ asset('frontend/img/author/2.jpg') }}" alt="man" /></a>
									</div>
									<div class="public-text">
										<div class="single-comm-top">
											<a href="#">{{ App\User::where(['id'=>$review->user_id])->pluck('name')[0] }}</a>
											<p>{{date('d F,Y H:i:s', strtotime($review->created_at))}}</p>
										</div>
										<p>{{$review->review}}</p>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog-main-area-end -->
<script type="text/javascript">
	function PrintElem(elem)
      {
      var mywindow = window.open('', 'PRINT', 'height=1000,width=1000');
      mywindow.document.write(document.getElementById(elem).innerHTML);

      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10*/

      mywindow.print();
      mywindow.close();

      return true;
    }
</script>
@endsection
