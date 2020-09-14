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
            <h1>إضافة عمل</h1>


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
              <li class="breadcrumb-item active">تعديل</li>
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

            <form action="{{url('ipanel/edit_work_values/'.$work->id)}}" enctype='multipart/form-data' method="post" class="text-right" role="from">
            {{csrf_field()}}

            <div class="form-group">
                    <label for="exampleInputFile"> إختر صورة </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input  name="work_image"
                        type="file" class="custom-file-input" 
                        id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">إختر صورة</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">رفع</span>
                      </div>
                    </div>
                  </div>


            <div class="form-group">
                    <label for="exampleInputEmail1">إسم العمل</label>
                    <input required name="work_name" 
                    type="text" class="form-control" 
                    id="exampleInputEmail1" 
                    value="{{$work->title}}"
                    placeholder="أدخل إسم العمل ">
                </div>

                <div class="form-group text-right">
                  <label for="exampleFormControlSelect1"> نوع الخدمة</label>
                  <select name="work_paranet_category" class="form-control text-right" id="exampleFormControlSelect1">
                  @foreach($categories as $category)
                    <option  value="{{$category->id}}" selected="true"?{{$category->id==$work->category->id}}:"false" >{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>


              <div class="my-3 from-group">
              <label for="exampleInputEmail1"> وصف العمل</label>
                <textarea required name="work_description"  class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          {{$work->work_description}}
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