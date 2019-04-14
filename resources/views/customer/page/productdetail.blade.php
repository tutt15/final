@extends('customer.layout.master')
@section('content')
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						@foreach($detail_product as $detail)
						<div class="item-slick3" data-thumb="upload/image/product/{{$detail->image}}">
							<div class="wrap-pic-w">
								<img src="upload/image/product/{{$detail->image}}" alt="IMG-PRODUCT">
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<div>
					@foreach($detail_product as $detail)
					<h4 class="product-detail-name m-text16 p-b-13">
						{{$detail->name}}
					</h4>

					<span class="m-text17">
						{{number_format($detail->price)}}đ
					</span>
					@endforeach
				</div>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								@if(Auth::check())
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="{{ $detail->id }}">
										Add to Cart
									</button>
		        					@else	
									<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"> 
		           						 <a href="{{route('login')}}">Add to cart <i class="fas fa-shopping-cart text-white"></i> </a> 
		        					</button>
								@endif
							</div>
						</div>
					</div>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{!!$detail->description!!}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				@foreach($related_product as $related)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="upload/image/product/{{$related->image}}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="{{ $related->id }}">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="{{route('productdetail',$related->id)}}" class="block2-name dis-block s-text3 p-b-5">
									{{$related->name}}
								</a>

								<span class="block2-price m-text6 p-r-5">
									{{number_format($related->price)}}
								</span>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>

		</div>
	</section>
	@endsection