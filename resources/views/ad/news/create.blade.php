@extends('ad.layout')
@section('content')
    <div class="container mt-3">
        <h5 class="text-info"> Tin tức </h5> 
        <div class="row"> 
            <div class="col-md-6 offset-md-3">
                <p class="mb-3 mt-3 text-success"> 
                @if( Session::has('thongbao')) {{Session::get('thongbao')}}
                @endif
                </p> 
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="POST" />
                    <div class="mb-3 d-flex flex-column">
                        <lable> Title </lable> 
                        <input type="text" id="title" class="form-control" placeholder="Title" name="title">
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> Epitomize </lable>
                        <textarea type="text" id="epitomize" placeholder="epitomize" class="form-control ckeditor" name="epitomize"></textarea> 
                    </div>
                        
                    <div class="mb-3 d-flex flex-column">
                        <lable> Content </lable>
                        <textarea type="text" id="content" placeholder="Content" class="form-control ckeditor" name="content"></textarea> 
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <lable> Image </lable>
                        <input type="file" id="image" name="image" class="form-control" class="form-control">
                    </div>
                    
                    <div class="mb-3 d-flex flex-column">
                        <lable> New </lable> 
                        <input type="text" id="new" class="form-control" placeholder="New" name="new">
                    </div>
    
                    <div class="mb-3">
                    <button type="submit"> THÊM
                    </button>
                    </div>
                    
                    
                    
                </form>
            </div>
        </div>

@endsection