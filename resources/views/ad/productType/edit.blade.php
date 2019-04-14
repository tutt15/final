@extends('ad.layout')
@section('content')
    <div class="container mt-3">
        <h3>Sửa danh mục</h3>
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
                <form action="{{route('productType.update', $type->id)}}" method="POST">
                     {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{$type->name}}" >
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea rows="15" cols="100" type="text" name="description" class="ckeditor" /></textarea> 
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-md">Lưu</button>

                </form>
            </div>
        </div>
    </div>
@endsection
