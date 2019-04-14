@extends('ad.layout')
@section('content')
<div class="container">
<a href="{{ route('product.index')}}" class="btn btn-primary" ><i class="fa fa-arrow-left"></i>Quay lại</a>
<h3 class="text-center">CHI TIẾT SẢN PHẨM</h3>
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Type_id </th>
                <th> Description </th>
                <th> Price </th>
                <th> Promotion_price </th>
                <th> Image </th>
                <th> Unit </th>
                <th> New </th>
                <th> Status </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
               
                    <tr>
                        <td> {{$product->id}} </td>
                        <td> {{$product->name}} </td>
                        <td> {{$product->producttype_id}} </td>
                        <td> {{$product->description}} </td>
                        <td> {{$product->price}} </td>
                        <td> {{$product->promotion_price}} </td>
                        <td> {{$product->image}} </td>
                        <td> {{$product->unit}} </td>
                        <td> {{$product->new}} </td>
                        <td> {{$product->status}} </td>
                        <td class="d-flex flex-row justify-content-center">
                            <form action="{{route('product.edit', $product->id)}}" method="GET">
                                <button class="btn btn-danger" ><i class="fa fa-edit"></i>Sửa</button>
                            </form>   
                        </td>
                    </tr>
               
          
        </tbody>
    </table>
</div>

@endsection