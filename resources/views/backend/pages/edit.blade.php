@extends('backend.layout')

@section('content') 

<section class="content-header">
    <div class="box box-primary"> 
      <div class="box-header with-border">   
        <h3>Pages => Edit</h3>
      </div>
    
      <div class="box-body">
        <form action="{{route('pages.update',$pages->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">ID</label>
                    <div class="row">
                        <div class="col-xs-12">
                        <input type="text" id="" class="form-control" readonly value="{{$pages->id}}">                         
                    </div> 
                </div>                
            </div>
            <div class="form-group">
                <label for="">Blog Tittle</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" name="pages_title" id="" value="{{$pages->pages_title}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Blog Slug</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" required name="pages_slug" id="" value="{{$pages->pages_slug}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Content</label>
                <div class="row">
                    <div class="col-xs-12">
                    <textarea name="pages_content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$pages->pages_content}}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" type="file"  name="pages_file" id="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Blog Status</label>
                <div class="row">
                    <div class="col-xs-12">
                        <select name="pages_status"  class="form-control form-control-lg">
                            <option @if ($pages->pages_status=='1')echo selected="" @endif value="1">Active</option>
                            <option @if ($pages->pages_status=='0')echo selected="" @endif value="0">Passive</option>
                          </select>
                    </div>
                </div>
            </div>

        <input type="hidden" name="old_file" value="{{$pages->pages_file}}">
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