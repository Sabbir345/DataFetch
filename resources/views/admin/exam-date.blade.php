<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/forms/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:35:12 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fultali</title>
  <!-- plugins:css -->
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/node_modules/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

</head>
<body class="sidebar-dark">
  <!-- partial:partials/_settings-panel.html -->
  <div class="settings-panel">
    <ul class="nav nav-tabs" id="setting-panel" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="layouts-tab" data-toggle="tab" href="#layouts-section" role="tab" aria-controls="layouts-section" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section"><i class="mdi mdi-account"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="close-button" href="#"><i class="mdi mdi-window-close"></i></a>
      </li>
    </ul>
    <div class="tab-content" id="setting-content">
      <div class="tab-pane fade show active" id="layouts-section" role="tabpanel" aria-labelledby="layouts-tab">
        <div class="color-tiles">
          <div class="tiles primary" id="primary-theme"></div>
          <div class="tiles success" id="success-theme"></div>
          <div class="tiles warning" id="warning-theme"></div>
          <div class="tiles danger" id="danger-theme"></div>
          <div class="tiles pink" id="pink-theme"></div>
          <div class="tiles info" id="info-theme"></div>
          <div class="tiles dark" id="dark-theme"></div>
          <div class="tiles light" id="light-theme"></div>
        </div>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle btn-block mb-4" type="button" id="sidebar-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sidebar Mode
          </button>
          <div class="dropdown-menu" aria-labelledby="sidebar-color">
            <a class="dropdown-item" href="#" id="side-theme-light">Light</a>
            <a class="dropdown-item" href="#" id="side-theme-dark">Dark</a>
          </div>
        </div>
        <div class="dropdown d-none d-md-block">
          <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="Layouts-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Layouts
          </button>
          <div class="dropdown-menu" aria-labelledby="Layouts-type">
            <a class="dropdown-item" href="#" id="boxed-layout-view">Boxed</a>
            <a class="dropdown-item" href="#" id="compact-layout-view">Compact menu</a>
            <a class="dropdown-item" href="#" id="icon-only-layout-view">Icon Menu</a>
            <a class="dropdown-item" href="#" id="rtl-layout-view">RTL</a>
            <a class="dropdown-item" href="#" id="hidden-menu-1-layout-view">Hidden Menu 1</a>
            <a class="dropdown-item" href="#" id="hidden-menu-2-layout-view">Hidden Menu 2</a>
          </div>
        </div>
      </div>
      <!-- layout section tabends -->
    
      <!-- chat section tabends -->
    </div>
  </div>
  <!-- partial -->
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-light col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{route('admin.dashboard')}}"><img src="{{asset('img/admin/logo.jpg')}}" style="height:50px ;width:50px ;" alt="Logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>

        <form action="{{route('logout')}}" method="post" style="margin-left: 85%;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn btn-danger" >Logout</button>
        </form>
                
      </div>
    </nav>
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <!--main pages start-->
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#validationSubmenu" aria-expanded="false" aria-controls="validationSubmenu">
                <i class="mdi mdi-table menu-icon"></i>
                <span class="menu-title">All General Student</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
              </a>
              <div class="collapse" id="validationSubmenu">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.general-students')}}">Student</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tablesSubmenu" aria-expanded="false" aria-controls="tablesSubmenu">
                <i class="mdi mdi-table menu-icon"></i>
                <span class="menu-title">All Registered Student</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
              </a>
              <div class="collapse" id="tablesSubmenu">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.registered-students')}}">Student List</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#examdate" aria-expanded="false" aria-controls="examdate">
                <i class="mdi mdi-calendar-multiple menu-icon"></i>
                <span class="menu-title">Exam Date</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
              </a>
              <div class="collapse" id="examdate">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('exam-dates')}}">Student</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.showPasswordChangeMenu')}}">
                <i class="mdi mdi-security menu-icon"></i>
                <span class="menu-title">Change Password</span>
              </a>
            </li>
            <!--forms end-->
          </ul>
        </nav>
        <!-- partial -->
        <div class="content-wrapper">
          <h1 class="page-title">Exam Date</h1>
          @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
             @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
          <div class="row">
              <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group date">
                                  <label for="female_date_1">Female Exam Date (1-800)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="female_date_1" name="female_date_1" value="{{$examDates[0]->date}}" required>
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="female_date_2">Female Exam Date ( 801- 1600)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="female_date_2" name="female_date_2" value="{{$examDates[1]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="female_date_3">Female Exam Date (1601- 2400)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="female_date_3" name="female_date_3" value="{{$examDates[2]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label>Female Exam Date (2401- 3200)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="female_date_4" name="female_date_4" value="{{$examDates[3]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="irregular_date_1">Irregular Exam Date (1-800)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="irregular_date_1" name="irregular_date_1" value="{{$examDates[4]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                           <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="irregular_date_2">Irregular Exam Date (801-1600)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="irregular_date_2" name="irregular_date_2" value="{{$examDates[5]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="irregular_date_3">Irregular Exam Date (1601-2400)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="irregular_date_3" name="irregular_date_3" value="{{$examDates[6]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="irregular_date_4">Irregular Exam Date (2401-3200)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="irregular_date_4" name="irregular_date_4" value="{{$examDates[7]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="improvement_date_1">Improvement Exam Date (1-800)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="improvement_date_1" name="improvement_date_1" value="{{$examDates[8]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="improvement_date_2">Improvement Exam Date (801-1600)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="improvement_date_2" name="improvement_date_2" value="{{$examDates[9]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
                <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="improvement_date_3">Improvement Exam Date (1601-2400)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="improvement_date_3" name="improvement_date_3" value="{{$examDates[10]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
               <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <form class="forms-sample" method="post" action="{{route('admin.save-exam-dates')}}">
                              <div class="form-group">
                                  <label for="improvement_date_4">Improvement Exam Date (2401-3200)</label>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" class="form-control p-input" id="improvement_date_4" name="improvement_date_4" value="{{$examDates[11]->date}}" required>
                              </div>
                              <button type="submit" class="btn btn-success">Update</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Fultali Admin</a> &copy; 2018
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/js/gijgo.min.js" type="text/javascript"></script>
  <script src="{{ asset('css/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('css/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('css/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('css/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- endinject -->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/admin/off-canvas.js') }}"></script>
  <script src="{{ asset('js/admin/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  <!-- End custom js for this page-->
</body>





