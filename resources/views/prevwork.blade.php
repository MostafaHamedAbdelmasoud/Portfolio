
@extends('layouts.app2')


@section('content')


<section id = 'prev-works' class="py-5"> 
<div class="container" dir="rtl">

 <div class=" pt-5" style="padding:60px 0px;">

    <h3 class="prev-works-title text-right">الاعمال السابقة</h3>
    <p class="text-right works-title-cont ">{{$service->name}} </p>
 </div>
<div class="row">

@foreach($works as $work)
    
    <div class="col-md-4 p-1" >
    <a href="{{url('/show_Work/'.$work->id)}}" style="text-decoration:none;">
            
        <div class="works-cont" >
        
          <img src="{{asset('images/'.$work->image)}}" class="img-fluid w-100">
          <div class="works-overlay d-flex justify-content-center align-items-center">
        

          <h2 class="text-white overlay-cont" >شاهد التفاصيل</h2>

          


          </div>
      </div>
    </a>
    </div>
@endforeach



</div>

</div>
</section>

    
  
  @endsection