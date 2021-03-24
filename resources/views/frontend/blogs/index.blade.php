@extends('frontend.layout')
@section('title',"Bloglar")
@section('content')   

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Bloglar
   
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{route('home.index')}}">Ana Sayfa</a>
      </li>
      <li class="breadcrumb-item active">Bloglar</li>
    </ol>

    @foreach ($data['blogs'] as $item)
    <!-- Blog Post -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <a href="">
            <img class="img-fluid rounded" src="/images/blogs/{{$item->blogs_file}}" alt="">
            </a>
          </div>
          <div class="col-lg-6">
          <h2 class="card-title">{{$item->blogs_title}}</h2>
          <p class="card-text">{!! substr($item->blogs_content,0,140) !!}</p>
          <a href="{{route('blogs.detail',$item->blogs_slug)}}"  class="btn btn-primary">Daha fazlası</a>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        {{$item->updated_at->format('d-m-y h:i')}}
      </div>
    </div>
    @endforeach


  </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>



</body>

</html>








@endsection
@section('css')  
@endsection
@section('js')    
@endsection