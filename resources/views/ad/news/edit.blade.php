@extends('ad.layout')
@section('content')
<div class="container mt-3">
     <a href="{{route('news.index')}}" class="btn btn-success" ><i class="fa fa-plus-circle"></i>Quay lại</a>
   <h5 class="text-info"> Tin tức </h5>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p class="mb-3 mt-3 text-success"> 
                    @if( Session::has('message')) {{Session::get('message')}}
                    @endif
                </p>
            </div>
        </div>
        <div class="row">
             <div class="col-xs-8 col-xs-offset-2">
                <form action="{{route('news.update', $tintuc->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Title </b> </lable>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$tintuc->title}}">
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Epitomize </b> </lable>
                        <textarea name="epitomize" class="ckeditor"> {{$tintuc->epitomize}} </textarea>
                    </div>
                    
                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Content </b> </lable>
                        <textarea name="content" class="ckeditor"> {{$tintuc->content}} </textarea>
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> Image </b> </lable>
                        <div class="Product_Image1 " alt="" style="background-image: url(upload/image/tintuc/{{$tintuc->image}})">
                        </div> <br>
                        <input type="file" id="image" class="form-control" name="image" class="form-control">
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> <b> New </b> </lable>
                        <input type="text" id="new" class="form-control" placeholder="New" name="new" value="{{$tintuc->new}}">
                    </div>

                    <button type="submit" class="btn btn-outline-info mb-3"> SAVE
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
    @endsection