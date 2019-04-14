@extends('customer.layout.master')
@section('content')
<section class="bg-title-page p-t-150 p-b-170 flex-col-c-m" style="background-image: url(code/images/product3.jpg);">
		<h2 class="l-text2 t-center">
			Beauty Cosmetic
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Cosmetic Collection 2019
		</p>
</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!-- Product -->
					<h1>Tìm kiếm sản phẩm</h1>
					<br />
					<div class="beta-products-details">
						<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
					</div>

					<div class="row pull-right">
						@foreach($product as $new)

						<div class="col-sm-12 col-md-5 col-lg-3 p-b-50" id="search">
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
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
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