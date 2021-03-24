@extends('backend.layout')

@section('content') 

<section class="content-header">
    <div class="box box-primary"> 
      <div class="box-header with-border">   
        <h3>Blogs => Edit</h3>
      </div>
    
      <div class="box-body">
        <form action="{{route('blogs.update',$blogs->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">ID</label>
                    <div class="row">
                        <div class="col-xs-12">
                        <input type="text" id="" class="form-control" readonly value="{{$blogs->id}}">                         
                    </div> 
                </div>                
            </div>
            <div class="form-group">
                <label for="">Blog Tittle</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" name="blogs_title" id="" value="{{$blogs->blogs_title}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Blog Slug</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" required name="blogs_slug" id="" value="{{$blogs->blogs_slug}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Content</label>
                <div class="row">
                    <div class="col-xs-12">
                    <textarea name="blogs_content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$blogs->blogs_content}}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" type="file"  name="blogs_file" id="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Blog Status</label>
                <div class="row">
                    <div class="col-xs-12">
                        <select name="blogs_status"  class="form-control form-control-lg">
                            <option @if ($blogs->blogs_status=='1')echo selected="" @endif value="1">Active</option>
                            <option @if ($blogs->blogs_status=='0')echo selected="" @endif value="0">Passive</option>
                          </select>
                    </div>
                </div>
            </div>

        <input type="hidden" name="old_file" value="{{$blogs->blogs_file}}">
            <div align="right">
                <button type="submit" class="btn btn-success">Send</button>
            </div>         
        </form>

      </div>
      
    </div>
</section>







<!--body section end here! -->
@endsection

@section('css') 
@endsection
@section('js') 
@endsection