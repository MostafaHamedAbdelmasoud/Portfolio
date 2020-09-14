@extends('layouts.app')

@section('extraCss')
<!-- <link rel="stylesheet" href="css/all.min.css">
   <link rel ="stylesheet" href="css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="css/index.css"> -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<style>
  /* .skill {
    width: {{ $skills[0]->value }};
} */
</style>
@endsection

@section('content')

<section id="home" style="background-image:  linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('images/{{$admin->image}}') ;" class="d-flex align-items-center pb-5">
  <div class="container ">

    <div class="home-info text-white" dir="rtl">
      <p>{{$admin->welcome}}</p>
      <h1>عمر عبد الله</h1>
      <a href="{{url('download/'.$admin->cv)}}" style="cursor:pointer;">
        <button class="btn-home btn btn-outlint-secondary" style="cursor:pointer;"> تنزيل الcv الخاص بي</button>
      </a>
    </div>


  </div>


</section>
<!-- about-->
<section id="about" dir="rtl" class="pt-5 text-left pb-5">

  <div class="container pt-5">

    <h3 class="about-title">من عمر؟</h3>
    <p class="about-cont-title">معلومات عني</p>
    <div class="row">
      <div class="col-md-5">
        <img src="{{asset('images/'.$admin->second_image)}}" class="img-fluid w-100 pt-2">
      </div>
      <div class="col-md-7 ">
        <div class="about-info mb-5">

          <p class="info-title">انا {{$admin->user->name}}</p>
          <p>{{$admin->job}} </p>
          <p class="about-p">
            {!! htmlspecialchars_decode($admin->description) !!}
          </p>

        </div>
        <div class="about-grid ">
          <div class="row">
            <div class="col-md-12">


              <div class="row">
                @foreach($fields as $field)
                <div class="col-md-6 text-left">
                  <span class="yellow-span">{{$field->name}} :</span>
                  <span>{{$field->value}}</span>
                  <hr>
                </div>

                @endforeach
              </div>


            </div>




          </div>
          <div class="icons d-flex justify-content-center">
            <i class="fab fa-twitter m-1"><a href=""></a></i>
            <b><i class="fab fa-instagram m-1"><a href=""></a></i></b>
            <i class="fab fa-snapchat-ghost m-1"><a href=""></a></i>
          </div>
        </div>




      </div>




    </div>

  </div>




</section>

<!---- our services-->
<section id=services class="py-5 text-left">
  <div class="container px-4" dir="rtl">
    <div class="d-flex justify-content-center">
      <h2 class="services-title">خدماتنا</h2>
    </div>

    <div class="services-cont mt-5 ">
      <div class="row">
        @foreach($services as $service)
        <div class="col-md-4 p-1 text-left">
          <a href="{{url('/services/'.$service->id)}}" style="text-decoration:none;">
            <div class="service-info bg-white" id="services-info" onclick="redirecttoservices()">

              <div class="d-flex justify-content-center">
                <img src="{{asset('images/'.$service->image)}}" class="img-fluid rounded-circle">
              </div>
              <p class="text-center my-3 service-info-title " style="color:black;padding:10px 0px;font-weight:100;">{{$service->name}} </p>
              <p class="text-left service-info-p pb-5">


                {!!htmlspecialchars_decode($service->description)!!}
              </p>
            </div>
          </a>
        </div>
        @endforeach





      </div>

    </div>

  </div>

</section>
<!--skills -->
<section id="skills" class="py-5">




  <div class="container">
    <div class="" dir="rtl">
      <h4 class="skills-title text-left">المهارات التي اتقنها</h4>
    </div>
    <div class="row">


      <div class="col-md-6 ">

        <img src="{{asset('images/'.$admin->skill_image)}}" class="img-fluid w-100">

      </div>
      <div class="col-md-6 pt-4">
        <div class="skills-info">

          <p class="skills-p text-left my-5">design and develop services for customers of all sizes, specializing in creating stylish, moden websites</p>

          @foreach($skills as $skill)
          <div class="my-5">
            <span class="left mt-3">{{$skill->value}}%</span> <span class="right mt-3">{{$skill->name}}</span>
            <div class="progress" dir="rtl">


              <div class="progress-bar skill bg-warning" role="progressbar" style="width: {{$skill->value}}%" ;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
              </div>

              <!-- <div class="progress-bar skill" role="progressbar"
    style="width: {{$skill->value}}%";background-color : #FFD600;"
         aria-valuenow="25" 
            aria-valuemin="0" 
            aria-valuemax="100"></div> -->

            </div>
          </div>
          @endforeach





        </div>
      </div>



    </div>
  </div>

</section>
<!-- Works-->
<section id="works" class="py-5" dir="rtl">

  <div class="container">
    <div class="d-flex justify-content-center " dir="rtl">
      <h2 class="works-title text-left ">اخر اعمالي</h2>
    </div>


  </div>

  <!-- <div class="nav-options d-flex justify-content-center">
  <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
    <li class="nav-item ">
      <a class="link-pill " id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">الكل</a>
    </li>
    <li class="nav-item">
      <a class="link-pill " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" >الهوية التجارية</a>
    </li>
    <li class="nav-item">
      <a class="link-pill " id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" >فوتوشوب</a>
    </li>
  </ul>
</div> -->
  <div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active " id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

      <div class="container">

        <div class="row">
          @foreach($last_Works as $last_Work)
          <div class="col-md-4 py-3">
            <a href="{{url('/show_Work/'.$last_Work->id)}}" style="text-decoration:none;">

              <div class="work">

                <img src="{{asset('images/'.$last_Work->image)}}" class="img-thumbnail w-100">

              </div>
            </a>
          </div>

          @endforeach

        </div>

      </div>



    </div>




  </div>




</section>
<!-- contact us-->
<section id="contact" class="py-5">
  <div class="d-flex justify-content-center" dir="rtl">
    <h2 class="contact-title text-left ">اتصل بنا</h2>
  </div>
  <div class="container">
    <div class="tellus-cont " dir="rtl">
      <h2 class="mt-5 tell-us text-center">اخبرنا بما تريد</h2>

      <div class="p-3">
        <form class="text-left " dir="rtl" action="{{url('/email')}}" method="post">
          {{csrf_field()}}


          <label class="tell-us">اسمك الكامل :</label>
          <input required name="user_name" class="form-control mb-4" placeholder="ادخل اسمك الكامل">
          <label class="tell-us">البريد الالكتروني :</label>
          <input required name="email" class="form-control mb-4" placeholder="ادخل بريدك">
          <label class="tell-us"> الرسالة :</label>
          <textarea required name="msg" class="form-control mb-4" placeholder="نص الرسالة هنا" rows="10"></textarea>

          <button class="btn btn-primary w-100 s-btn " type="submit">Send</button>
      </div>
      </form>
    </div>

  </div>



</section>


@endsection
<!-- <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
    <script src="js/index.js"></script>  -->