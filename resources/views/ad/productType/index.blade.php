@extends('ad.layout')
@section('content')

<h3>Danh mục sản phẩm</h3>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th class="w-10">Tên</th>
        <th class="w-25">Mô tả</th>
        <th class="width-10">Thêm</th>
        <th class="width-10">Sửa</th>
        <th class="width-10">Xóa</th>
      </tr>
    </thead>
    <tbody>
    @foreach($types as $type)
      <tr>
        <td>{{ $type->id }}</td>
        <td>{{ $type->name }}</td>
        <td>{!! $type->description !!}</td>

        <td>
          <form action="{{ route('productType.create')}}" method="GET">
          <button class="btn btn-info"><i class="fas fa-plus"></i></button>
          </form>
        </td>

        <td>
            <form action="{{route('productType.edit', $type->id)}}" method="GET">
              <button class="btn btn-info" ><i class="fas fa-pen-alt"></i></button>
            </form> 
        </td> 

        <td>
            <form action="{{route('productType.destroy', $type->id)}}" method="POST">
                {{csrf_field()}}
                    <input type='hidden' value='DELETE' name='_method' method="POST">

                    <button type="submit" class='btn btn-danger'> <i class="fa fa-times-circle"></i></button> 
            </form>  
        </td>

      </tr> 
      @endforeach
    </tbody>
  </table>
  <div class="d-flex flex-row">
  <div class="col-9"></div>
  <div class="col-3">
    <div class="d-flex justify-content-start">
    
    </div>
  </div>
</div>
@endsection
@if (session('messages'))
    <div class="alert alert-success">
        {{ session('messages') }}
    </div>
@endif