@extends('ad.layout')
@section('content')
<div class="container">
<a href="{{ route('users.index')}}" class="btn btn-primary" ><i class="fa fa-arrow-left"></i>Quay lại</a>
<h3 class="text-center">CHI TIẾT</h3>
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone_number </th>
                <th> Address </th>
                <th> Note </th>
                <th> Role </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> {{$user->id}} </td>
                <td> {{$user->name}} </td>
                <td> {{$user->email}} </td>
                <td> {{$user->phone_number}} </td>
                <td> {{$user->address}} </td>
                <td> {{$user->note}} </td>
                <td> {{$user->role}} </td>
                <td class="d-flex flex-row justify-content-center">  
                    <a href="{{route('users.edit', $user->id)}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection