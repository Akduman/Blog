<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!--  <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css"> -->
 
  <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/backend/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="/backend/custom/css/custom.css">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- REQUIRED JS SCRIPTS -->

  <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/backend/dist/js/adminlte.min.js"></script>      
  <!-- jQuery 3 -->
  <script src="/backend/bower_components/jquery-ui/jquery-ui.js"></script>  
  <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Csm</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- /.messages-menu -->

          <!-- Notifications Menu -->

  

          <!-- Tasks Menu -->

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
            <img src="/images/users/{{Auth::user()->users_file}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/images/users/{{Auth::user()->users_file}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('users.edit',Auth::user()->id)}}" class="btn btn-default btn-flat">Profile Preferences</a>
                </div>
                <div class="pull-right">
                <a href="{{route('nedmin.Logout')}}" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="/images/users/{{Auth::user()->users_file}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      
      <!-- search form (Optional) 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menü</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{route('nedmin.Index')}}"><i class="fa fa-home"></i> <span>Dasboard</span></a></li>
        
        <li><a href="{{route('blogs.index')}}"><i class="fa fa-paper-plane"></i> <span>Blogs</span></a></li>
        <li><a href="{{route('pages.index')}}"><i class="fa fa-paper-plane"></i> <span>Pages</span></a></li>
        <li><a href="{{route('sliders.index')}}"><i class="fa fa-image"></i></i><span>Sliders</span></a></li>
        <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i></i><span>Users</span></a></li>
        <li><a href="{{route('settings.Index')}}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
  
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Bursı Orası !!!!!!!!!!!!!!!!!!!!!!!! -->
    <!-- Sayfa içeriği !!!!!!!!!!!!!!!!!!!!!!!! -->


    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Exemple Project
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

  @if (session()->has('success'))
      <script>alertify.success('{{session('success')}}')</script>   
  @endif
  @if (session()->has('error'))
      <script>alertify.error('{{session('error')}}')</script>   
@endif

@foreach($errors->all() as $error)
    <script>
        alertify.error('{{$error}}');
    </script>
@endforeach


</body>
</html>