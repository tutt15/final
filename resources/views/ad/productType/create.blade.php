

@extends('ad.layout')
@section('content')

<div class="container">
<h3>Tạo danh mục</h3>
 <div class="row"> 
    <div class="col-md-6 offset-md-3">
        <p class="mb-3 mt-3 text-success"> 
        @if( Session::has('thongbao')) {{Session::get('thongbao')}}
        @endif
        </p> 
    </div>
</div>
  <form action="{!! route('productType.store') !!}"  method="POST">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
    <div class="form-group">
      <label for="name_product_type">Tên danh mục:</label>
      <input type="text" class="form-control" placeholder="Tên dòng sản phẩm" name="name">
      <p class="text-danger"></p>
    </div>

    <div class="form-group">
      <label for="description">Mô tả:</label>
      <textarea rows="15" cols="100" name="description" class="ckeditor" id="description"></textarea>
           <p class="text-danger"></p>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
</div>
@endsection




