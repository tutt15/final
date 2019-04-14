@extends('ad.layout')
@section('content')
<div class="container">
    <a href="{{ route('productType.index')}}" class="btn btn-primary" ><i class="fa fa-arrow-left"></i>Quay lại</a>
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Description </th>
                <th> Created_at </th>
                <th> Updated_at </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> {{$type->id}} </td>
                <td> {{$type->name}} </td>
                <td> {{$type->description}} </td>
                <td> {{$type->created_at}} </td>
                <td> {{$type->updated_at}} </td>
                <td class="d-flex flex-row justify-content-center">
                    <form action="{{route('productType.edit', $type->id)}}" method="GET">
                        <button class="btn btn-primary"><i class="fa fa-pencil"></i> </button> 
                    </form>
                        
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection