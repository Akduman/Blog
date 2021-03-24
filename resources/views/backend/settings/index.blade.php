@extends('backend.layout')

@section('content') 

<section class="content-header">
<div class="box box-primary"> 
  <div class="box-header with-border">   
    <h3>Settings</h3>
  </div>

  <div class="box-body">
      <table class="table table-striped">
        <tread>
            <tr>
              <th>ID</th>
              <th>Explanation</th>
              <th>Description</th>
              <th>Key Value</th>
              <th>Type</th>
              <th></th>
              <th></th>
            </tr>            
            <tbody id="sortable">
              @foreach ($data['adminSettings'] as $item)
                <tr id="item-{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td class="sortable">{{$item->settings_description}}</td>
                    <td>{{$item->settings_value}}</td>
                    <td>{{$item->settings_key}}</td>
                    <td>{{$item->settings_type}}</td>
                    <td width="5" ><a href="{{route('settings.Edit',['id'=>$item->id])}}"><i class="fa fa-pencil-square" ></a></td>
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
  
</div>
  </section>

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
                    url: "{{route('settings.Sortable')}}",
                    success: function (msg) {
                         
                        if (msg) {
                            alertify.success("Succes");
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
      destroy_id=$(this).attr('id');
      alertify.confirm('Confirm your delete action','This action cannot be reverse',
      function () {
        location.href="/nedmin/settings/delete/"+destroy_id;
      },
      function () {
        alertify.error('Delete action has been canceled');
      }
      )      
    });


</script>



@endsection
@section('css') 
@endsection
@section('js')
    
@endsection

    
