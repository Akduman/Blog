@extends('backend.layout')

@section('content') 

<section class="content-header">
<div class="box box-primary"> 
  <div class="box-header with-border">   
    <h3>Blogs</h3>
  <div align="right"><a href="{{route('pages.create')}}"><button  class="btn btn-success" type="submit">New Pages</button></a></div>
  </div>

  <div class="box-body">
      <table class="table table-striped">
        <tread>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Content</th>
              <th></th>
              <th></th>
            </tr>            
            <tbody id="sortable">
              @foreach ($data['pages'] as $item)
                <tr id="item-{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td class="sortable">{{$item->pages_title}}</td>
                    <td>{{$item->pages_content}}</td>
                    <td width="5" ><a href="{{route('pages.edit',$item->id)}}"><i class="fa fa-pencil-square" ></a></td>
                    <td width="5">
                      @if ($item->pages_status)
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
    $(function(){

        $.ajaxSetup({
            headers:{
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
                    url: "{{route('pages.Sortable')}}",
                    success: function (msg) {
                         
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
                    url:"pages/"+destroy_id,
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

    
