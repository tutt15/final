@extends('customer.layout.master')
@section('content')
<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1"   style="background-image: url(code/images/hinh7.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Fashe Cosmetic
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="{{route('product')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(code/images/hinh6.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Fashe Cosmetic
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="{{route('product')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(code/images/hinh2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Fashe Cosmetic
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="{{route('product')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm mới
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				@foreach($new_products as $index)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="upload/image/product/{{$index->image}}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										@if(Auth::check())
											@if($index->status == 'Còn')
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="{{ $index->id }}">
													Add to Cart
												</button>
		                    					@elseif($index->status =='Hết')
		                    					<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
													Hết hàng
												</button>
											@endif
										@else	
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"> 
	                       						 <a href="{{route('loginn')}}">Add to cart <i class="fas fa-shopping-cart text-white"></i> </a> 
	                    					</button>
										@endif
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="{{route('productdetail',$index->id)}}" class="block2-name dis-block s-text3 p-b-5">
									{{$index->name}}
								</a>

								<span class="block2-price m-text6 p-r-5">
									{{number_format($index->price)}}đ
								</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>

		</div>
	</section>

	<section class="feature bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm nổi bật
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				@foreach($feature_products as $index)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block1-labelnew">
								<img src="upload/image/product/{{$index->image}}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										@if(Auth::check())
												@if($index->status == 'Còn')
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="{{ $index->id }}">
														Add to Cart
													</button>
			                    					@elseif($index->status =='Hết')
			                    					<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
														Hết hàng
													</button>
												@endif
											@else	
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"> 
		                       						 <a href="{{ route('loginn') }}">Add to cart </a> 
		                    					</button>
			                    				
											@endif
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="{{route('productdetail',$index->id)}}" class="block2-name dis-block s-text3 p-b-5">
									{{$index->name}}
								</a>

								<span class="block2-price m-text6 p-r-5">
									{{number_format($index->price)}}đ
								</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>

		</div>
	</section>




	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Bài viết
				</h3>
			</div>
			<div class="row">
				@foreach($new as $news)
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="{{route('blogdetail')}}" class="block3-img dis-block hov-img-zoom">
							<img src="upload/image/tintuc/{{$news->image}}" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="{{route('blogdetail',$news->id)}}" class="m-text11">
									{!!$news->title!!}
								</a>
							</h4>
							<p class="s-text8 p-t-16">
								{!!$news->epitomize!!}
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		
	</section>



	<!-- Instagram -->
	@endsection