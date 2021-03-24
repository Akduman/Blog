@extends('frontend.layout')
@section('title',"Blog Detayı")
@section('content')   

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{$data['pages']->pages_title}}</h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('home.index')}}">Ana Sayfa</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('pages.index')}}">Pages</a>
      </li>
      <li class="breadcrumb-item active">{{$data['pages']->pages_slug}}</li>
    </ol>

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="/images/pages/{{$data['pages']->pages_file}}" alt="">

        <hr>


        <!-- Date/Time -->
        <p>{{$data['pages']->updated_at}}</p>
        <hr>
        <p>
            {{$data['pages']->pages_content}}
        </p>        
      </div>
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
            <ul class="list-group">
            <li class="list-group-item active">Son Sayfalar</li>

                @foreach ($data['pages_list'] as $item)
            <a href="{{route('pages.detail',$item->pages_slug)}}"><li class="list-group-item">{{$item->pages_title}}</li> </a>

                @endforeach
                
              </ul>
        </div> 
    </div>   

    </div>

    <!-- /.row -->


  </div>

@endsection
@section('css')  
@endsection
@section('js')    
@endsection