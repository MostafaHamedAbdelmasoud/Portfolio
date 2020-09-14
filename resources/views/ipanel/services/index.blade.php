@extends('ipanel.layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>الخدمات</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">لوحة الرئيسية</a></li>
              <li class="breadcrumb-item active">الخدمات</li>
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
          <h3 class="card-title">كل الخدمات </h3>

          <div class="card-tools">
          <a href="{{url('ipanel/add-services')}}">
            <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
                <span>إضافة خدمة</span>
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
                      <th style="width: 10%"  class="text-center">
                          
                      </th>
                      <th style="width: 40%">
                          إسم الخدمة
                      </th>
                      <th  class="text-center">
                          عرض الخدمة
                      </th>
                      <th  class="text-center">
                          تعديل الخدمة
                      </th>
                      <th class="text-center">
                          حذف الخدمة
                      </th>
                      <th style="width: 1%">
                      </th>
                  </tr>
              </thead>
              <tbody>
        @foreach($services as $service)

            <tr>
                      <td>
                          {{++$cnt}}
                      </td>
                      
                      <td>
                          <img src="{{asset('images/'.$service->image)}}" width="40px" height="40px" alt="">
                      </td>
                      
                      <td  class="text-center">
                          <a>
                            {{$service->name}}
                          </a>
                      </td>
                     

                      <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="{{url('/ipanel/display-services/'.$service->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              عرض
                          </a>
                    </td>

                    <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{url('/ipanel/edit-services/'.$service->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              تعديل 
                          </a>
                    </td> 
                <td> 
                  <a class="btn btn-danger btn-sm" href="{{url('/ipanel/delete-services/'.$service->id)}}">
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