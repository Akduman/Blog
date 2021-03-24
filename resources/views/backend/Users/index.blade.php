@extends('backend.layout')

@section('content') 

<section class="content-header">
<div class="box box-primary"> 
  <div class="box-header with-border">   
    <h3>Users</h3>
  <div align="right"><a href="{{route('users.create')}}"><button  class="btn btn-success" type="submit">New User</button></a></div>
  </div>

  <div class="box-body">
      <table class="table table-striped">
        <tread>
            <tr>
              <th>ID</th>
              <th></th>
              <th>User Name</th>
              <th>E-mail</th>
              <th>Image</th>
              <th></th>
              <th></th>
            </tr>            
            <tbody id="sortable">
              @foreach ($data['users'] as $item)
                <tr id="item-{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td class="sortable">{{$item->users_name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td> 
                    <td><img width="100" height="100" src="/images/users/{{$item->users_file}}" alt="" srcset=""></td>                   
                    <td width="5" ><a href="{{route('users.edit',$item->id)}}"><i class="fa fa-pencil-square" ></a></td>
                    <td width="5">
                          @if ($item->settings_delete)
                             <a href="javascript:void(0)"><i id="{{$item->id}}" class="fa fa-trash-o" ></i></a>                                                
                          @endif
                     
                    </td>
                </tr>
              @endforeach
            </tbody>
        </tread>

      </table>
  </div>
  <script type="text/javascript">
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#sortable').sortable({
            revert: true,
            handle: ".sortable",
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "{{route('users.Sortable')}}",
                    success: function (msg) {
                         //console.log(msg);
                        if (msg) {
                            alertify.success("Success");
                        } else {
                            alertify.error("Faild");
                        }
                    }
                });

            }
        });
        $('#sortable').disableSelection();

    });

    $(".fa-trash-o").click(function () {
        destroy_id = $(this).attr('id');

        alertify.confirm('Confirm your delete action','This action cannot be reverse',
            function () {

            $.ajax({
                type:"DELETE",
                url:"blog/"+destroy_id,
                success: function (msg) {
                    if (msg)
                    {
                        $("#item-"+destroy_id).remove();
                        alertify.success("Delete action is completed");

                    } else {
                        alertify.error("Delete action has been canceled");
                    }
                }
            });

            },
            function () {
                alertify.error('Delete action has been canceled')
            }
        )

    });
</script>

@endsection
@section('css') 
@endsection
@section('js')
    
@endsection

    
