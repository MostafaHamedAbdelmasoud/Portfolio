@extends('ipanel.layouts.master')

@section('extraCss')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')

 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> تعديل خدمة</h1>


            @if ($errors->any())
                          <div class="alert alert-danger text-center">
                              <ul style="list-style-type:none;">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
               @endif

              @if(session('message'))
              <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-block {{ session('type') }}">
                          <button type="button" class="close" data-dismiss="alert"></button>
                          <h4 class="alert-heading">{{ session('message') }}</h4>
                        
                      </div>
                  </div>
              </div>
            
            
          @endif

          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active">تعديل الخدمات </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                التفاصيل 
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
               </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">

            <form action="{{url('/ipanel/edit-services_values/'.$service->id)}}" enctype='multipart/form-data' method="post" class="text-right" role="from">
            {{csrf_field()}}

            <div class="form-group">
                    <label for="exampleInputFile"> إختر صورة </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="service_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">إختر صورة</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">رفع</span>
                      </div>
                    </div>
                  </div>


            <div class="form-group">
                    <label for="exampleInputEmail1">إسم الخدمة</label>
                    <input name="service_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="أدخل إسم الخدمة " value="{{$service->name}}">
                </div>

              <div class="my-3 from-group">
              <label for="exampleInputEmail1"> وصف الخدمة</label>
                <textarea name="service_description" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          {{$service->description}}
                          </textarea>
              </div>



              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>


            </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection


  @section('extraJs')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
  <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

  @endsection