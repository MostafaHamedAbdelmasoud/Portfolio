@extends('ipanel.layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>معلومات عني</h1>


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
              <li class="breadcrumb-item"><a href="#">لوحة الرئيسية</a></li>
              <li class="breadcrumb-item active">معلومات عني</li>
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
          <h3 class="card-title">كل المعلومات </h3>

          <div class="card-tools">
          <a href="{{url('ipanel/about/add-field')}}">
            <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
                <span>إضافة حقل</span>
                </button>
              </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

          </div>
        </div>
        <div class="card-body p-0">

        

          <table class="table table-striped text-center projects w-100" >
              <thead>


                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          إسم الحقل
                      </th>
                      <th  class="text-center" style="width: 50%">
                          قيمة الحقل
                      </th>
                      <th  class="text-center">
                          تعديل الحقل
                      </th>
                      <th class="text-center">
                          حذف الحقل
                      </th>
                      <th style="width: 1%">
                      </th>
                  </tr>
              </thead>
              <tbody>
       
        @foreach($fields as $field)
                <tr>
                      <td>
                        {{++$cnt}}  
                      </td>
                      
                      <td>
                          <a>
                              {{$field->name}} 
                          </a>
                      </td>
                     

                      <td class="project-actions text-center">
                      {{$field->value}} 
                        </td>

                        <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{asset('/ipanel/about/edit-field/'.$field->id )}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              تعديل 
                          </a>
                        </td> 
                        <td> 
                        <a class="btn btn-danger btn-sm" href="{{asset('/ipanel/about/delete-field/'.$field->id )}} ">
                                <i class="fas fa-trash">
                                </i>
                                حذف 
                            </a>
                        </td>

                        <td class="project-actions text-center">
                            
                        </td>


                         
                </tr>
                 
        @endforeach 
              
              
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection