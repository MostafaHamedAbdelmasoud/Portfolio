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
          <h1>التفاصيل</h1>

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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">التفاصيل</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 text-right">
          <!-- general form elements -->
          <div class="card card-primary ">
            <div class="card-header">
              <h3 class="card-title">تعديلات الصفحة الرئيسية</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{url('/ipanel/main')}}" enctype='multipart/form-data' method="post">
              {{csrf_field()}}


              <div class="card-body ">


                <div class="form-group">
                  <label for="exampleInputFile"> الصورة الرئيسية </label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="user_main_image" type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">إختر صورة</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">رفع</span>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="exampleInputFile"> الصورة الثانوية </label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="user_second_image" type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">إختر صورة</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">رفع</span>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="exampleInputFile"> صورة المهارات </label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="user_skill_image" type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">إختر صورة</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">رفع</span>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="">كلمات الترحيب </label>
                  <input name="welcome" type="text" required class="form-control" id="exampleInputEmail1" placeholder="أدخل كلمات الترحيب" value="{{$admin['welcome']}}">
                </div>

                <div class="form-group">
                  <label for=""> الوظيفة الرئيسية</label>
                  <input name="job" type="text" required class="form-control" id="exampleInputEmail1" placeholder="أدخل الوظيفة الرئيسية" value="{{$admin['job']}}">
                </div>

                <div class="form-group">
                  <label for=""> الإسم</label>
                  <input name="name" type="text" required class="form-control" id="exampleInputEmail1" placeholder=" الإسم" value="{{$admin->user['name']}}">
                </div>

                <div class="my-3 from-group">
                  <label for="exampleInputEmail1"> وصف عني</label>
                  <textarea required name="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{$admin->description}}
                  </textarea>
                </div>


                <div class="form-group">
                  <label for="exampleInputFile">File input -> {{Auth::User()['cv']}}</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <label class="custom-file-label" for="exampleInputFile"> file</label>
                      <input name="cv" type="file" class="custom-file-input" id="exampleInputFile" value="{{Auth::User()['cv']}}">
                    </div>

                    <div class="input-group-append">
                      <span class="input-group-text" id="">رفع</span>
                    </div>
                  </div>
                </div>



              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->



          <!-- /.card -->


        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection


@section('extraJs')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script>
  $(function() {
    // Summernote
    $('.textarea').summernote()
  })
</script>

@endsection