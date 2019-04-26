@extends('ad.layout')
@section('content')

<div class="container-fluid Admin_Size_content">
    <a href="{{ route('ad')}}" class="btn btn-primary" ><i class="fa fa-arrow-left"></i>Quay lại</a>
    <h4 class="text-center">NGƯỜI DÙNG</h4>
    <table class="table table-hover table-bordered text-center ">
        <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone_number </th>
                <th> Address </th>
                <th> Show  </th>
                <th> Edit  </th>
            </tr>
        </thead>
        <tbody>
                @foreach($users as $user)
                    <tr>
                        <td> {{$user->id}} </td>
                        <td> {{$user->name}} </td>
                        <td> {{$user->email}} </td>
                        <td> {{$user->phone_number}} </td>
                        <td> {{$user->address}} </td>
                        <td >
                        <div class="d-flex flex-row justify-content-center">
                            <a href="{{route('users.show', $user->id)}}" title="" class="btn btn-success btn-md"><i class="fa fa-th-list"></i></a>
                        </div>  
                            
                        </td>
                        <td><div class="d-flex flex-row justify-content-center">
                        	 <a href="{{route('users.edit', $user->id)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                        </div>  </td>
                    </tr>
                @endforeach
          
        </tbody>
    </table>
    <div class="row mt-7" >
                    <div class="col-md-10 d-flex justify-content-center " style="font-size: 10px;">
                        {{$users->links("pagination::bootstrap-4")}}
                    </div>
                </div>
</div>
@endsection