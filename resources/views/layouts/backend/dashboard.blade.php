<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
     Teacher Student Guide
  </title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 <!-- CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="#ADD8E6">
     
      <div class="logo">
        <a href="" class="simple-text logo-normal" align="center">
          Management
        </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">

          <li>
            <a href="{{ route('course.index') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p> Courses </p>
            </a>
          </li>

          <li>
            <a href="{{ route('teacher.index') }}">
              <i class="now-ui-icons text_caps-small"></i>
              <p> Teachers </p>
            </a>
          </li>

          <li>
            <a href="{{ route('student.index') }}">
              <i class="now-ui-icons text_caps-small"></i>
              <p> Students </p>
            </a>
          </li>

        </ul>
      </div>

    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
        
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                     <p style="color:black"> 
                        {{ Auth::user('admin')->name }} 
                     </p>
                </a>
              </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                     <p style="color:black"> 
                        {{ __('Logout') }}
                     </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="">
        <canvas id="bigDashboardChart"></canvas>
      </div>

      <div class="content">
            @yield('content')
      </div>
       

      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
                TEACHER STUDENT MANAGEMENT
            </ul>
          </nav>
        </div>
      </footer>

    </div>
  </div>

</body>

</html>