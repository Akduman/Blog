@extends('backend.layout')

@section('content') 

<section class="content-header">
    <div class="box box-primary"> 
      <div class="box-header with-border">   
        <h3>Settings => Edit</h3>
      </div>
    
      <div class="box-body">
      <form action="{{route('settings.Update',['id'=>$settings->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">ID</label>
                    <div class="row">
                        <div class="col-xs-12">
                        <input type="text" id="" class="form-control" readonly value="{{$settings->id}}">                         
                    </div> 
                </div>                
            </div>
            <div class="form-group">
                <label for="">Explanation</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" name="settings_description" id="" value="{{$settings->settings_description}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" required name="settings_value" id="" value="{{$settings->settings_value}}">
                    </div>
                </div>
            </div>

            @if ($settings->settings_type=="text")
            <div class="form-group">
                <label for="">Key Value</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" required name="settings_key" id="" value="{{$settings->settings_key}}">
                    </div>
                </div>
            </div> 
            @endif
            @if ($settings->settings_type=="file")
            <div class="form-group">
                <label for="">Key Value</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="file"  name="settings_key" id="" value="{{$settings->settings_key}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">File</label>
                <div class="row">
                    <div class="col-xs-12">
                    <img width="200" height="200"  src="/images/settings/{{$settings->settings_key}}" alt="" srcset="">
                    <input type="hidden" name="settings_old_key" value="{{$settings->settings_key}}">
                    </div>
                </div>

                </div>
 
            @endif
 
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