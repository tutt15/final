@extends('ad.layout')
@section('content')
<div class="container border-bottom">
    <div class="row mt-3 mb-3 w-100">
        <div class="col-md-4 offset-md-4">
            <h5 class=""> Hóa Đơn: {{$bill->id}} </h5>
        </div>
    </div>
</div>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-md-6 ">
            <table class="table table-hover table-sm table-bordered text-center">
                <thead>
                    <tr>
                        <th> Thông tin khách hàng </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Họ tên </td>
                        <td> {{$bill->user->name}} </td>
                    </tr>
                    <tr>
                        <td> Địa chỉ email </td>
                        <td> {{$bill->user->email}} </td>
                    </tr>
                    <tr>
                        <td> Số điện thoại </td>
                        <td> {{$bill->user->phone_number}} </td>
                    </tr>
                    <tr>
                        <td> Địa chỉ </td>
                        <td> {{$bill->user->address}} </td>
                    </tr>
                    <tr>
                        <td> Note </td>
                        <td> {{$bill->user->note}} </td>
                    </tr>
                    <tr>
                        <td> Ngày đặt hàng  </td>
                        <td> {{$bill->date_order}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <table class="table table-hover table-sm table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th> ID sản phẩm </th>
                <th> Tên sản phẩm </th>
                <th> Số lượng </th>
                <th> Price </th>
            </tr>
        </thead>
        <tbody>

            @foreach($bill->products as $pr)
            <tr>
                <td> {{$pr->id}} </td>
                <td> {{$pr->name}} </td>
                <td> {{$pr->pivot->quantity}} </td>
                <td> {{$pr->pivot->price}} </td> 
            </tr>
            @endforeach
            <tr>
                <th colspan="3" > 
                    <div class="d-flex justify-content-start"> Tổng tiền: </div> 
                </th>
                <td> 
                    <div class="text-danger"> {{$bill->total}} </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="container mb-3">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <form action="{{route('bills.update', $bill->id)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT" />
                <div class="mb-3 d-flex flex-row">
                    <lable> <b> Trạng thái: </b></lable>
                    <lable class="ml-3 radio-inline text-danger">
                        <input type="radio" id="status" name="status" value="Chưa giao hàng" checked=""> Chưa giao hàng
                    </lable>
                    <lable class="ml-3 radio-inline text-danger">
                        <input type="radio" id="status" name="status" value="Đang giao hàng" checked=""> Đang giao hàng
                    </lable>
                    <lable class="ml-3 radio-inline text-danger">
                        <input type="radio" id="status" name="status" value="Giao hàng thành công" checked=""> Giao hàng thành công
                    </lable>    
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-info" type="submit"> SAVE
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>

@endsection