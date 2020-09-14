<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

  <!-- Styles -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('css/guest.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
  @yield('extraCss')
</head>

<body>
  <div id="app">

    <!--Navbar-->
    <nav class="navbar navGuest navbar-expand-lg navbar-dark ">
      <div class="container ">
        <p class="navbar-brand " style="padding:10px 0px 0px 0px;"> عمر | معرض الاعمال</p>

        <button class="navbar-toggler btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ">
            <li class="nav-item ">
              <a class="nav-link" href="{{url('/index#home')}}">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/index#about')}}">عنى</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/index#services')}}">الخدمات</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/index#skills')}}">المهارات</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/index#works')}}">معرض الاعمال</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/index#contact')}}"> اتصل بنا</a>
            </li>
            @if(Auth::User())
            @if(Auth::User()->isAdmin ==1)
            <li class="nav-item ">
              <a class="nav-link btn btn-outline-secondary" href="{{ url('/admin_verify') }}"> لوحة التحكم</a>
            </li>
            @endif
            <li class="nav-item ">
              <form  action="{{url('/logout')}}" method="post">
                {{ csrf_field() }}
                <a class="nav-link"  type="submit" name="logout">
                <button class="btn btn-outline-secondary " style="color: white;" type="submit">
                    خروج
                  </button>
                </a>
              </form>
            </li>
            @else
            <li><a class="nav-link" href="{{ url('/login') }}">تسجيل دخول</a></li>
            <li><a class="nav-link" href="{{ url('/register') }}">تسجيل جديد</a></li>
            @endif
          </ul>
        </div>
      </div>
  </div>
  </nav>

  <main>
    @yield('content')
  </main>
  </div>




  <footer id="footer" class="p-5">
    <h2 class="mt-3 text-center text-white">OMAR</h2>
    <div class="d-flex justify-content-center">


      <a href="{{url('/request_service')}}" class="text-white text-center my-3">تعرف علي كيفية طلب الخدمات</a>


    </div>
    <div class="d-flex justify-content-center text-white mb-3">

      <i class="fab fa-twitter m-1"><a href=""></a></i>
      <b><i class="fab fa-instagram m-1"><a href=""></a></i></b>
      <i class="fab fa-snapchat-ghost m-1"><a href=""></a></i>



    </div>
    <div class="d-flex justify-content-center text-white mb-3">

      <p> 2020 © Copyright all rights reserved. </p>
    </div>



  </footer>

  <!-- Scripts -->
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
  @yield('extraJs')
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}" defer></script>
  <script src="{{ asset('js/popper.min.js') }}" defer></script>
  <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
  <!-- <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> -->
  <script src="{{ asset('js/guest.js') }}" defer></script>

</body>

</html>