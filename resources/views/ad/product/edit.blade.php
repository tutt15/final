@extends('ad.layout')
@section('content')
    <div class="container mt-3 mb-5">
        <h3 class="text-center">THÔNG TIN SẢN PHẨM</h3>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="mb-3 mt-3 text-success"> 
                @if( Session::has('message')) {{Session::get('message')}}
                @endif
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Name </b> </lable>
                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{$product->name}}">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Producttype_id </b> </lable>
                        <input type="text" id="producttype_id" class="form-control" placeholder="Producttype_id" name="producttype_id" value="{{$product->producttype_id}}">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Description </b> </lable>
                        <textarea id="description" class="form-control ckeditor" name="description"> {{$product->description}}</textarea>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Price </b> </lable>
                        <input type="text" id="price" class="form-control" placeholder="Price" name="price" value="{{$product->price}}">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Promotion_price </b> </lable>
                        <input type="text" id="promotion_price" class="form-control" placeholder="Promotion_price" name="promotion_price" value="{{$product->promotion_price}}">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Image </b> </lable>
                        <div class="Product_Image1 " alt="" style="background-image: url(upload/image/product/{{$product->image}})">
                        </div> <br>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Unit </b> </lable>
                        <input type="text" id="unit" class="form-control" placeholder="Unit" name="unit" value="{{$product->unit}}">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> New </b></lable>
                        <input type="text" id="new" class="form-control" placeholder="New" name="new" value="{{$product->new}}">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Status </b></lable>
                        <lable class="radio-inline">
                        <input type="radio" id="status" name="status" value="Hết" checked=""> Hết
                        </lable>
                        <lable class="radio-inline">
                        <input type="radio" id="status" name="status" value="Còn" checked=""> Còn
                        </lable>
                        
                    </div>

                    <button type="submit">Lưu</button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection