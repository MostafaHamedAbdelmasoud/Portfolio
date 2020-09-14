@extends('layouts.app2')

@section('extraCss')
@endsection

@section('content')

<section id='work' class="py-5">
  <div class="container" style="padding:60px 0px;">


    <div class="row pt-5">
      <div class="col-sm-12 text-center">
        <h3 class="work-title text-right">تفاصيل العمل </h3>
        <img src="{{url('images/'.$work->image)}}" class="py-4 img-fluid  rounded m-auto " style="border-radius:20% ;width:750px!important;height:440px!important;">
        <div class="work-info pt-5">

          <div class="d-flex justify-content-center">
            <h4 class="work-title"> {{$work->title}}</h4>
          </div>
          <div class="text-right">
            <p class="work-info-p mt-3" dir="rtl">
              {!!htmlspecialchars_decode($work->work_description)!!}
            </p>
          </div>
          <p class="text-right mt-4">تعرف علي كيفية طلب الخدمات</p>
          <div id="paypal-button"></div>

        </div>

      </div>
    </div>
  </div>
</section>




<div id="paypal-button"></div>
@endsection

@section('extraJs')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>



<script>
  paypal.Button.render({
    env: 'sandbox', // Or 'production'
    style: {
      size: 'large'
    },
    // Set up the payment:
    // 1. Add a payment callback
    payment: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post("{{url('api/create-payment')}}")
        .then(function(res) {
          // 3. Return res.id from the response
          return res.id;
        });
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post("{{url('api/execute-payment')}}", {
          paymentID: data.paymentID,
          payerID: data.payerID
        })
        .then(function(res) {
          // 3. Show the buyer a confirmation message.
        });
    }
  }, '#paypal-button');
</script>
@endsection