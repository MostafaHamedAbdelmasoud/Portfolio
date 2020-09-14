@extends('layouts.app2')


@section('content')


    <div class="d-flex justify-content-center pt-5" >

     <h3 class="ourservices-title pt-5 my-5">خدماتنا</h3>
    </div> 
    <div class="container"  style="padding:60px 0px;" dir="rtl">
     <div class="row">
@if($categories->count()>0)
     @foreach($categories as $category)
        <div class="col-md-4 p-1" >
             
          <a href="{{url('/prev_Works/'.$category->id)}}" style="text-decoration:none;">
          <div class="service-info " id="services-info" >
              <div class="d-flex justify-content-center">
                <img src="images/ball.jpg" class="img-fluid rouneded " style="border-radius:20% ;width:750px!important;height:440px!important;"  >
              </div>
              <p class="text-center my-3 service-info-title"> {{$category->name}}   </p>
              <p class="text-right service-info-p my-3 text-center ">{{$category->cat_description}}</p>
              <p class="service-info-p  text-center"> رسوم الخدمة : ${{$category->price}}</p>
              <div class="d-flex justify-content-center">
                  <button class="btn btn-primary" onclick="redirecttoprevwork()">شاهد الاعمال السابقة </button>
              </div>
  
           </div>
           <a>
      @endforeach
      @else
      <div class="col-md-12 py-4 text-center">

      <h4 style="font-weight:600;">لا توجد خدمات متعلقة بهذه الخدمة</h4>
      </div>
      @endif
    </div>
    

</div>
</div>

@endsection