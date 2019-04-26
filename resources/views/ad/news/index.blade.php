@extends('ad.layout')
@section('content')

<div class="container-fluid Admin_Size_content">
    <a href="{{route('news.create')}}" class="btn btn-success" ><i class="fa fa-plus-circle"></i>Thêm</a>
    <h4 class="text-center"> News </h4>
    <table class="table table-hover table-bordered text-center ">
        <thead>
            <tr>
                <th> # </th>
                <th> Title </th>
                <th> Epitomize </th>
                <th> Content </th>
                <th> Image </th>
                <th> New </th>
                <th> Edit</th>
                <th> Delete</th>
            </tr>
        </thead>
        <tbody>
                @foreach($tintuc as $t)
                    <tr>
                        <td> {{$t->id}} </td>
                        <td> {{$t->title}} </td>
                        <td> {{$t->epitomize}} </td>
                        <td> {{$t->content}} </td>
                        <td> {{$t->image}} </td>
                        <td> {{$t->new}} </td>
                        <td >
                            <a href="{{route('news.edit', $t->id)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i></a>      
                        </td>
                        <td >
                           <form action="{{route('news.destroy', $t->id)}}" method="POST">
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
            {{$tintuc->links("pagination::bootstrap-4")}}
        </div>
    </div>
    <a href="{{route('news.index')}}" class="btn btn-success" ><i class="fa fa-plus-circle"></i>Quay lại</a>
</div>
@endsection