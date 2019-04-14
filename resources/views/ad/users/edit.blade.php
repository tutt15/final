@extends('ad.layout')
@section('content')
    <div class="container mt-3">
        <a href="{{ route('ad')}}" class="btn btn-primary" ><i class="fa fa-arrow-left"></i>Quay lại</a>
        <h5 class="text-center">THÔNG TIN NGƯỜI DÙNG</h5> </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <form action="{{route('users.update', $user->id)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT" />
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Name </b> </lable>
                        <input type="text" id="name" placeholder="Name" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Email </b> </lable>
                        <input type="email" id="email" placeholder="Email" name="email" class="form-control" value="{{$user->email}}">
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Phone_number </b> </lable>
                        <input type="text" id="phone_number" placeholder="Phone_number" name="phone_number" class="form-control" value="{{$user->phone_number}}">
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Address </b> </lable>
                        <input type="text" id="address" placeholder="Address" name="address" class="form-control" value="{{$user->address}}">
                    </div>

                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection