@extends('customer.layout.master')
@section('content')
<div class="container">
    @if(Session::has('success'))
               <div class="alert alert-success">
                 {{ Session::get('success') }}
               </div>
            @endif
    <form action="{{ route('bills') }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
           
        </div>
         <div class="row mb-5">
            <div class="col-md-6 card">
                 <div class="card-header"> <h4> Đặt hàng </h4> </div>
            @if(Auth::check()) 
               <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label"> Họ tên*: </label>
                <div class="col-sm-10">
                  <input type="text" readonly name="name" class="form-control-plaintext" id="name" value="{{ Auth::user()->name }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> Email*: </label>
                <div class="col-sm-5">
                  <input type="text" name="email" class="form-control" id="email" placeholder="email" value="{{ Auth::user()->email }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label"> Address*: </label>
                <div class="col-sm-5">
                  <input type="text" name="address" class="form-control" id="address" placeholder="address" value="{{ Auth::user()->address }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="phone_number" class="col-sm-2 col-form-label"> Phone*: </label>
                <div class="col-sm-5">
                  <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="phone_number" value="{{Auth::user()->phone_number }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="note" class="col-sm-2 col-form-label"> Note: </label>
                <div class="col-sm-5">
                  <textarea type="text" name="note" class="form-control" id="note" placeholder="" value="{{ Auth::user()->note }}"></textarea>
                </div>
              </div>
            @endif
            </div>
           
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header"> <h4> Đơn hàng của bạn </h4> </div>
                    @php
                        $items = Cart::content();
                     @endphp
                     @foreach($items as $item)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="Bill_card-donhang_left " alt="" style="background-image: url(upload/image/product/{{$item->options['image']}})">
                            </div>
                            <div class="Bill_card-donhang_right" >
                                <p class ="text-danger text-capitalize">{{ $item->name }}  </p>
                                <span> <b> Price:{{ number_format($item->price) }} </b></span>
                                <span> <b> Quantity: </b>{{ $item->qty }}  </p></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex flex-row ">
                                <h4 class="pr-3"> Total: </h4>{{ number_format($item->subtotal) }}<h4></h4>
                            </div>
                        </li>
                    </ul>
                    
                    @endforeach
                    <h2>Subtotal: {{ Cart::subtotal() }}</h2>
                </div>
                <div class="card ">
                    <div class="card-header"> <h4> Hình thức thanh toán </h4> </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="">
                                <input type="radio" name="payment" value="ATM" checked> Chuyển khoản <br>
                                <div class="d-flex flex-column pl-5">
                                    <span> Chuyển khoản đến tài khoản: </span>
                                    <span> - STK: 2002220044018 </span>
                                    <span> - Chủ TK: Trương Thị Tư </span>
                                    <span> - Ngân hàng Agribank </span>
                                </div>
                            </li>
                            <li class="">
                                <input type="radio" name="payment" value="COD" checked> Thanh toán khi nhận hàng <br>
                                <div class="pl-5">
                                    <span> Nhận tiền khi giao hàng tận nơi </span>
                                    
                                </div>
                            </li>
                        </ul>
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-info ">
                                Hoàn thành
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection