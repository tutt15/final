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
					<h4 class="product-detail-name m-text16 p-b-13" style="color: red;">
						{{$detail->name}}
					</h4>

					<span class="m-text17">
						{{number_format($detail->price)}}đ
					</span>
					
					<h6 class="m-text10 p-b-13" style="font-size: 17px;"><span style="font-weight: bold;">Dạng:</span> {{$detail->unit}}</h6> 
					<h5 class="m-text10 p-b-13" style="font-size: 17px;" ><span style="font-weight: bold;">Trạng thái:</span> {{$detail->status}}</h5>
					<span style="font-size: 17px;">Số lượng hàng đã bán: {{ $quantity_sold->count()}}</span>
					@endforeach
				</div>

				<!--  -->
				<div class="p-t-33 p-b-60">
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
									@if($index->status == 'Còn')
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="{{ $detail->id }}">
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
	@if(Auth::check())
	<form action="comment/{{ $detail->id }}" method="post" class="leave-comment" role="form">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<h4 class="m-text25 p-b-14">
			Viết bình luận
		</h4>
		<div class="text-success">
                    @if( session('thongbao'))
                        {{session('thongbao')}}
                    @endif
                </div>
		<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment" placeholder="Viết bình luận............"></textarea>
		<div class="w-size24">
			<!-- Button -->
			<button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
				Gửi
			</button>
		</div>
	</form>
	@endif
	<div class="row mt-3">
        @foreach($comment as $cm)
        <div class="col-md-9">
            <div class="d-flex flex-row"> 
                <div class="mr-3"> <i class="fa fa-user"></i> </div>
                <div>
                    <p> 
                        <b>{{$cm->user->name}}</b> <i>{{$cm->created_at}}</i>
                    </p>
                    <p> {{$cm->comment}} </p>
                    
                </div>
            </div>
        </div>
        @endforeach
	</div>

        
	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm liên quan
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
									@if(Auth::check())
										@if($index->status == 'Còn')
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="{{ $related->id }}">
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