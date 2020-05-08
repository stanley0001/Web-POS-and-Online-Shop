<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="#123">
  
      <div class="logo">
        <a href="/" class="simple-text logo-normal">
          Home
        </a>
      </div>


      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="/dashbord">
            <i class="now-ui-icons education_atom"></i>
              <p style="color:green">Dashboard</p>
            </a>
          </li>
          <li>
            <a href="/stocktaking">
            <i class="now-ui-icons design_app"></i>
              <p>Stock Taking</p>
            </a>
          </li>
          <li>
          <script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
stan = y + "-" + m + "-" + d;
function sdate(){
  document.location.href="/sales"+stan+""
}
</script>
            <a onclick="return sdate()">
              <i class="now-ui-icons location_map-big"></i>
              <p>Sales</p>
            </a>
          </li>
          <li>
            <a href="/chat">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications / Messages</p>
            </a>
          </li>
          <li>
            <a href="/users">
              <i class="now-ui-icons users_single-02"></i>
              <p>Users</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Services</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Offers update</p>
            </a>
          </li>
          <li>
            <a href="/customers">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Customer Registration</p>
            </a>
          </li>
          <li>
            <a href="/Blog">
            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Blog</p>
            </a>
          </li>
      
        </ul>
      </div>
    </div>


    <div class="main-panel" id="main-panel">


      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="/admin">Dashboard</a><br>
      
          </div>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
             <!-- search panel -->
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">{{ Auth::User()->name}}</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./updateuser{{ Auth::user()->id }}">Update Profile</a>
              
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            
                
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/home">
                <i class="now-ui-icons location_world"></i>
                  <p>
                  
                    <span class="d-lg-none d-md-block">User Dashboard</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      <div class="panel-header panel-header-lg">
        
      </div>


      <div class="content">
          @yield('content')
      </div>


        <footer class="footer">
          <div class=" container-fluid ">
            <div class="copyright" id="copyright">
              &copy; BRAINSTECH <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
              </script>
            </div>
          </div>
        </footer>
      </div>
    </div>



    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <script src="../assets/demo/demo.js"></script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
  
      });
    </script>
    @yield('scripts')
  </body>
  
  </html>