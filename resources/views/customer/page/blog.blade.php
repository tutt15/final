<!-- Title Page -->
@extends('customer.layout.master')	
@section('content')
	<section class="bg-title-page p-t-140 p-b-150 flex-col-c-m" style="background-image: url(code/images/blog5.jpg);">
		<h2 class="l-text2 t-center">
			Blog
		</h2>
	</section>
	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-50">
					<div class="p-r-50 p-r-0-lg">
						@foreach($new as $news)
						<div class="item-blog p-b-80">
							<a href="{{route('blogdetail',$news->id)}}" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="upload/image/tintuc/{{$news->image}}" alt="IMG-BLOG">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									28 Dec, 2018
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="{{route('blogdetail',$news->id)}}" class="m-text24">
										{{$news->title}}
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										Cooking, Food
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>

								<p class="p-b-12">
									{!! $news->epitomize !!}
								</p>

								<a href="{{route('blogdetail',$news->id)}}" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>
						@endforeach
						<!-- item blog -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
