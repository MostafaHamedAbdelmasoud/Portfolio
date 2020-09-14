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
            <h1>  تفاصيل العمل</h1>

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
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">وصف العمل </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row text-right">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row text-right">
              <div class="col-12 col-sm-4 text-right" ></div>
              <div class="col-12 col-sm-4 text-right" ></div>
                <div class="col-12 col-sm-4 text-right" >
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">عدد المشاهدات</span>
                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row text-right">
                <div class="col-12">
                  <h4>أخر التعديلات </h4>

                    <div class="post">
                      <div class="user-block">
                        <!-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"> -->
                        
                        <span class="description">تم إنشائه في {{$work->created_at}}</span>
                        <br>
                        <span class="description">تم تعديله في {{$work->updated_at}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                       وصف
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div><hr>

            </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2 text-right">
              <h3 class="text-primary">{{$work->title}}<i class="fas fa-paint-brush"></i></h3>
              <p class="text-muted">
              {!!htmlspecialchars_decode($work->work_description)  !!}

                </p>
              <br>
              <div class="text-muted">
                <p class="text-sm"> صورة الخدمة
                  <b class="d-block">
                  <img src="{{asset('images/'.$work->image)}}" class="img-fluid">
                  </b>
                </p>
              </div>

              
              <div class="text-center mt-5 mb-3">
                <a href="{{url('/ipanel/edit-works/'.$work->id)}}" class="btn btn-sm btn-primary"> تعديل</a>
                <a href="{{url('/ipanel/delete-works/'.$work->id)}}" class="btn btn-sm btn-danger"> حذف</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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