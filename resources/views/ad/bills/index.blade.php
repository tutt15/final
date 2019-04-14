@extends('ad.layout')
@section('content')

<div class="container-fluid Admin_Size_content">
    <h4 class="text-center"> Bills </h4>
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th> # </th>
                <th> Customer </th>
                <th> Date_order </th>
                <th> Total </th>
                <th> Note </th>
                <th> Payment </th>
                <th> Status </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $bill)
            <tr>
                <td> {{$bill->id}} </td>
                <td> {{$bill->user->name}} </td>
                <td> {{$bill->date_order}} </td>
                <td> {{$bill->total}} </td>
                <td> {{$bill->note}} </td>
                <td> {{$bill->payment}} </td>
                <td class="text-danger"> {{$bill->status}} </td>
                
                <td >
                    <div class="d-flex flex-row justify-content-center">
                        <form action="{{route('bills.show', $bill->id)}}" method="GET">
                            <button class='btn btn-danger ml-2'> <i class="far fa-eye"></i> </button>
                        </form>
                            
                        </div> 
                    </td> 
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="row mt-4">
            <div class="col-md-12 d-flex justify-content-center ">
                {{$bills->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>


    @endsection