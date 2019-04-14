@extends('customer.layout.master')
@section('content')
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(code/images/cnt.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-5 p-b-30">
					<div class="hov-img-zoom">
						<img src="code/images/conta.jpg" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-7 p-b-30">
					<form class="leave-comment" method="post" action="{{route('contact')}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>
						@if(Session::has('success'))
						   <div class="alert alert-success">
						     {{ Session::get('success') }}
						   </div>
						@endif
						<div class="bo4 of-hidden size15 m-b-20 {{ $errors->has('name') ? 'has-error' : '' }}" >
							<input class="sizefull s-text7 p-l-22 p-r-22 form-control" type="text" name="name" placeholder="Enter Name">
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>

						<div class="bo4 of-hidden size15 m-b-20 {{ $errors->has('email') ? 'has-error' : '' }} ">
							<input class="sizefull s-text7 p-l-22 p-r-22 form-control" type="text" name="email" placeholder="Enter Email">
							<span class="text-danger">{{ $errors->first('email') }}</span>
						</div>
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						     <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20 form-control" name="message" placeholder="Message">
						     </textarea>
						     <span class="text-danger">{{ $errors->first('message') }}</span>
						</div>
						<div class="w-size25">
							<!-- Button -->
							<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" style="text-align: center;">
								Send
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	@endsection