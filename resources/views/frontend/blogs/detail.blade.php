@extends('frontend.layout')
@section('title',"Blog Detayı")
@section('content')   

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{$data['blogs']->blogs_title}}</h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('home.index')}}">Ana Sayfa</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('blogss.index')}}">Bloglar</a>
      </li>
      <li class="breadcrumb-item active">{{$data['blogs']->blogs_slug}}</li>
    </ol>

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="/images/blogs/{{$data['blogs']->blogs_file}}" alt="">

        <hr>


        <!-- Date/Time -->
        <p>{{$data['blogs']->updated_at}}</p>
        <hr>
        <p>
            {{$data['blogs']->blogs_content}}
        </p>        
      </div>
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
            <ul class="list-group">
            <li class="list-group-item active">Popüler Bloglar</li>

                @foreach ($data['blogs_list'] as $item)
            <a href="{{route('blogs.detail',$item->blogs_slug)}}"><li class="list-group-item">{{$item->blogs_title}}</li> </a>

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