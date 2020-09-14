@extends('ipanel.layouts.master')

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
                <h3 class="card-title">تعديل معلومات</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('ipanel/about/edit_field_values/'.$field->id)}}" method="post">
              {{csrf_field()}}

                <div class="card-body ">
 
                  <div class="form-group">
                    <label for=""> الإسم</label>
                    <input required name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="أدخل الإسم" value="{{$field->name}}">
                  </div>
                  
                  <div class="form-group">
                    <label for=""> نص الحقل</label>
                    <input required name="value" type="text" class="form-control" id="exampleInputEmail1" placeholder="أدخل النص" value="{{$field->value}}">
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