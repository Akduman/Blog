@extends('backend.layout')

@section('content') 

<section class="content-header">
    <div class="box box-primary"> 
            <div class="box-header with-border">   
                <h3>Create User</h3>
            </div>
    
      <div class="box-body">
        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">User Name</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" required  name="users_name" id="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required name="users_password" id="">                   
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="">E-mail</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" required type="text"  name="users_email" id="">                   
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" type="file"  name="users_file" id="">            
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">User Status</label>
                <div class="row">
                    <div class="col-xs-12">
                        <select name="users_status" class="form-control form-control-lg">
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