@extends('ad.layout')
@section('content')
    <div class="container mt-3 mb-5">
        <a href="{{ route('product.index')}}" class="btn btn-primary" ><i class="fa fa-arrow-left"></i>Quay lại</a>
        <h3> THÊM SẢN PHẨM</h3>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="mb-3 mt-3 text-success"> 
                @if( Session::has('thongbao')) {{Session::get('thongbao')}}
                @endif
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="POST" />
                    <div class="mb-3 d-flex flex-column">
                        <lable> Name </lable>
                        <input type="text" id="name" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Producttype </lable>
                        <select class="form-control" name="producttype_id">
                            @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">
                                    {{$tl->name}}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Description </lable>
                        <textarea id="description" class="form-control ckeditor" name="description"></textarea>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Price </lable>
                        <input type="text" id="price" class="form-control" placeholder="Price" name="price">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Promotion_price </lable>
                        <input type="text" id="promotion_price" class="form-control" placeholder="Promotion_price" name="promotion_price">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Image </lable>
                        <input type="file" id="image"  class="form-control" name="image" >
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> Unit </lable>
                        <input type="text" class="form-control" id="unit" placeholder="Unit" name="unit">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> New </lable>
                        <input type="text" class="form-control" id="new" placeholder="New" name="new">
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Status </b></lable>
                        <lable class="radio-inline">
                        <input type="radio" id="status" name="status" value="Còn" checked=""> Còn
                        </lable>
                        <lable class="radio-inline">
                        <input type="radio" id="status"  name="status" value="Hết" checked=""> Hết
                        </lable>
                    </div>
                    <div>
                        <button type="submit">THÊM</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection