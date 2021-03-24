@extends('backend.layout')

@section('content') 

<section class="content-header">
    <div class="box box-primary"> 
      <div class="box-header with-border">   
        <h3>User => Edit</h3>
      </div>
    
      <div class="box-body">
        <form action="{{route('users.update',$users->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">ID</label>
                    <div class="row">
                        <div class="col-xs-12">
                        <input type="text" id="" class="form-control" readonly value="{{$users->id}}">                         
                    </div> 
                </div>                
            </div>
            <div class="form-group">
                <label for="">User Name</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="text" name="users_name" id="" value="{{$users->name}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">User E-mail</label>
                <div class="row">
                    <div class="col-xs-12">
                    <input class="form-control" type="email"  name="users_email" id="" value="{{$users->email}}">
                    
                    </div>
                </div>
            </div>

        <!--    <div class="form-group">
                <label for="">User Password</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" type="password"  name="users_password" id="" value="">
                        <label for="">Change pw after 3 length.</label>
                    </div>
                </div>
            </div>
        -->

            <div class="form-group">
                <label for="">Image</label>
                <div class="row">
                    <div class="col-xs-12">
                        <input class="form-control" type="file"  name="users_file" id="">

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <div class="row">
                    <div class="col-xs-12">
                        <img src="/images/users/{{$users->users_file}}" width="100" height="100" alt="">
                        <input type="hidden" name="old_file">                        
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">User Status</label>
                <div class="row">
                    <div class="col-xs-12">
                        <select name="users_status"  class="form-control form-control-lg">
                            <option @if ($users->users_status=='1')echo selected="" @endif value="1">Active</option>
                            <option @if ($users->users_status=='0')echo selected="" @endif value="0">Passive</option>
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