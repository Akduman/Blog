@extends('backend.layout')

@section('content') 

<section class="content-header">
    <div class="box box-primary"> 
            <div class="box-header with-border">   
                <h3>Create Slider</h3>
            </div>
    
      <div class="box-body">
            <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="">Image</label>
                    <div class="row">
                        <div class="col-xs-12">
                        <input class="form-control" type="file"  name="sliders_file" id="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Slider Title</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="form-control" type="text"  name="sliders_title" id="">                   
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="">Slider Slug</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="form-control" type="text"  name="sliders_slug" id="">                   
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="">Content</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea name="sliders_content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Slider Status</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <select name="sliders_status" class="form-control form-control-lg">
                                <option value="1">Active</option>
                                <option value="0">Passive</option>
                              </select>
                        </div>
                    </div>
                </div>



                <div class="form-group">    
        
                    <div align="right">
                    <button type="submit" class="btn btn-success">Send</button>
                    </div> 
                    
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