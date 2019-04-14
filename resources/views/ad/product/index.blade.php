@extends('ad.layout')
@section('content')
    
<div class="container-fluid Admin_Size_content">
    <a href="{{route('product.create')}}" class="btn btn-success" style="float: right;"><i class="fa fa-plus-circle"></i>Thêm</a>
    <h3 >SẢN PHẨM</h3>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p class="mb-3 mt-3 text-success"> 
            @if( Session::has('thongbao')) {{Session::get('thongbao')}}
            @endif
            </p>
        </div>
    </div>
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Producttype_id </th>
                <th> Price </th>
                <th> Promotion_price </th>
                <th> Image</th>
                <th> Status </th>
                <th> Xem </th>
                <th> Sửa </th>
                <th> Xóa </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->producttype_id}} </td>
                    <td> {{$product->price}} </td>
                    <td> {{$product->promotion_price}} </td>
                    <td> {{$product->image}} </td>
                    <td> {{$product->status}} </td>
                    <td >
                        <a href="{{route('product.show', $product->id)}}" title="" class="btn btn-success btn-md"><i class="fa fa-th-list"></i></a>
                    </td>
                    <td>
                        <a href="{{route('product.edit', $product->id)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                    </td>
                    <td>
                        <form action="{{route('product.destroy', $product->id)}}" method="POST">
                            {{csrf_field()}}
                                <input type='hidden' value='DELETE' name='_method' method="POST">

                                <button type="submit" class='btn btn-danger'> <i class="fa fa-times-circle"></i></button> 
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row mt-4">
        <div class="col-md-12 d-flex justify-content-center ">
            {{$products->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>


@endsection