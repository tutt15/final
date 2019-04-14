@extends('ad.layout')
@section('content')
    <div class="container mt-3">
        <div class="row"> 
            <div class="col-md-6 offset-md-3">
                <h5 class="text-info"> Thông tin bills </h5> </div>
            </div>
        
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{route('bills.update', $bill->id)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT" />
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Customer </b> </lable>
                        <input type="text" id="name" placeholder="Name " name="name " value="{{$bill->user->name }}" readonly>
                    </div>

                    <div class="mb-3 d-flex flex-column">       
                        <lable> <b> Date_order </b> </lable>
                        <input type="text" id="date_order" placeholder="Date_order" name="date_order" value="{{$bill->date_order}}" readonly>
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Total </b> </lable>
                        <input type="text" id="total" placeholder="Total" name="total" value="{{$bill->total}}" readonly>
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Note </b> </lable>
                        <input type="text" id="note" placeholder="Note" name="note" value="{{$bill->note}}" readonly>
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Payment </b> </lable>
                        <input type="text" id="payment" placeholder="Payment" name="payment" value="{{$bill->payment}}" readonly>
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Status </b></lable>
                        <lable class="radio-inline text-danger">
                        <input type="radio" id="status" name="status" value="Chưa giao hàng" checked=""> Chưa giao hàng
                        </lable>
                        <lable class="radio-inline text-danger">
                        <input type="radio" id="status" name="status" value="Đang giao hàng" checked=""> Đang giao hàng
                        </lable>
                        <lable class="radio-inline text-danger">
                        <input type="radio" id="status" name="status" value="Giao hàng thành công" checked=""> Giao hàng thành công
                        </lable>
                        
                    </div>
                    <button type="submit"> SAVE
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection