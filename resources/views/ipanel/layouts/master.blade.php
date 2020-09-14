<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> عُمر | لوحة التحكم</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <!-- <link 
  rel="stylesheet"
  href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
  integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If"
  crossorigin="anonymous"> -->
  <link rel="icon" href="{{asset('images/people.png')}}" type="image/png" sizes="16x16">

  @yield("extraCss")

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block text-right">
          <a href="{{url('/index')}}" class="nav-link">زيارة الموقع</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="إبحث" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{asset('images/dashboard2.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 " style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة التحكم</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('images/people.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::User()['name']}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="{{url('/ipanel/admin')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  لوحة التحكم
                </p>
              </a>

            </li>

            <li class="nav-item has-treeview menu-open">
              <a href="{{url('/ipanel/edit-main')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  تعديل الصفحة الرئيسية
                </p>
              </a>

            </li>


            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  عني
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{asset('/ipanel/about')}}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>تعديل معلومات عني</p>
                  </a>
                </li>
              </ul>
            </li>



            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  <p>الخدمات</p>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('ipanel/orders')}}" class="nav-link">
                    <i class="fas fa-cart-plus nav-icon"></i>
                    <p>الخدمات المطلوبة</p>
                  </a>
                </li>
                <li class="nav-item ">
                  <a href="{{url('ipanel/show-services')}}" class="nav-link">
                    <!-- <i class="far fa-circle nav-icon"></i> -->
                    <i class="fas fa-paint-brush nav-icon"></i>
                    <p>كل الخدمات</p>
                    <!-- <span class="badge badge-info right"> -->
                    <!-- it can be disables from controller parent -->

                    <!-- </span> -->
                  </a>

                </li>


                <li class="nav-item">
                  <a href="{{url('/ipanel/categories')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      الفئات
                      <!-- <span class="badge badge-info right"> -->
                      <!-- it can be disables from controller parent -->

                      <!-- </span> -->
                    </p>
                  </a>
                </li>

              </ul>
            </li>




            <li class="nav-item">
              <a href="{{url('/ipanel/skills')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  المهارات
                </p>
              </a>
            </li>





            <li class="nav-item">
              <a href="{{url('/ipanel/works/')}}" class="nav-link">
                <i class="nav-icon fas fa-image"></i>
                <p>
                  أخر الأعمال
                </p>
              </a>
            </li>





          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    @yield('content')



    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>تسجيل &copy; 2020 <a href="#">عُمر</a>.</strong>
      كل الحقوق محفوظة.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <script src="{{asset('js/app.js')}}"></script>
  <!-- <script
  src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
  integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
  crossorigin="anonymous"></script> -->
  @yield("extraJs")
</body>

</html>