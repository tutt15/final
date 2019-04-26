@extends('customer.layout.master')
@section('content')
<section class="bg-title-page p-t-150 p-b-170 flex-col-c-m" style="background-image: url(code/images/product3.jpg);">
		<h2 class="l-text2 t-center">
			Fashe Cosmetic
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Cosmetic Collection 2019
		</p>
</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							@foreach($type_home as $type)
							<li class="p-t-4">
								<a href="{{route('producttype',$type->id)}}" class="s-text13">
									{{$type->name}}
								</a>
							</li>
		 					@endforeach
						</ul>
						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="flex-sb-m flex-w p-t-16">

								<div class="s-text3 p-t-10 p-b-10">
									Range: <span id="value-lower">100đ</span>-<span id="value-upper">950đ</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<form role="search" method="GET" id="searchform" action="{{route('search')}}">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" id="search" name="key" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->

					<!-- Product -->
					<div class="row">
						@foreach($products as $new)

						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50" id="search">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="upload/image/product/{{$new->image}}" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											@if(Auth::check())
												@if($new->status == 'Còn')
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="{{ $new->id }}">
														Add to Cart
													</button>
			                    					@elseif($new->status =='Hết')
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
									<a href="{{route('productdetail',$new->id)}}" class="block2-name dis-block s-text3 p-b-5">
										{{$new->name}}
									</a>

									<span class="block2-price m-text6 p-r-5">
										{{number_format($new->price)}}đ
									</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
@endsection