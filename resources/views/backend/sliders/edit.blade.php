@extends('backend.layout')

@section('content') 

<section class="content-header">
    <div class="box box-primary"> 
      <div class="box-header with-border">   
        <h3>Slider => Edit</h3>
      </div>
    
      <div class="box-body">
        <form action="{{route('sliders.update',$sliders->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">ID</label>
                    <div class="row">
                        <div class="col-xs-12">
                        <input type="text" id="" class="form-control" readonly value="{{$sliders->id}}">                         
                    </div> 
                </div>                
            </div>
            <div class="form-group">
                <label for="">Slider Tittle</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" name="sliders_title" id="" value="{{$sliders->sliders_title}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Slider Slug</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" required name="sliders_slug" id="" value="{{$sliders->sliders_slug}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Slider Content</label>
                <div class="row">
                    <div class="col-xs-12">
                    <textarea name="sliders_content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$sliders->sliders_content}}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" type="file"  name="sliders_file" id="">
                        <input type="hidden" name="old_file" value="{{$sliders->sliders_file}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Slider Status</label>
                <div class="row">
                    <div class="col-xs-12">
                        <select name="sliders_status"  class="form-control form-control-lg">
                            <option @if ($sliders->sliders_status=='1')echo selected="" @endif value="1">Active</option>
                            <option @if ($sliders->sliders_status=='0')echo selected="" @endif value="0">Passive</option>
                          </select>
                    </div>
                </div>
            </div>

       
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