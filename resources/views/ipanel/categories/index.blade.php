@extends('ipanel.layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>الفئات </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">لوحة الرئيسية</a></li>
              <li class="breadcrumb-item active">الفئات </li>
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
          <h3 class="card-title">اﻷنواع </h3>

          <div class="card-tools">
          <a href="{{url('ipanel/add-categories')}}">
            <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
                <span>إضافة فئة جديدة</span>
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
                      <th style="width: 10%">
                          
                      </th>
                      <th style="width: 30%">
                          إسم الفئة
                      </th>
                      <th style="width: 30%">
                           إسم الخدمة
                      </th>
                      <th  class="text-center">
                          عرض الفئة
                      </th>
                      <th  class="text-center">
                          تعديل الفئة
                      </th>
                      <th class="text-center">
                          حذف الفئة
                      </th>
                      <th style="width: 1%">
                      </th>
                  </tr>
              </thead>
              <tbody>
 
              @foreach($categories as $category)
                  <tr>
                      <td>
                          {{++$cnt}}
                      </td>
                      
                      <td>
                          <a>
                          <img src="{{asset('images/'.$category->image)}}" width="40px" height="40px" alt="">
                             
                          </a>
                      </td>

                      <td>
                          <a>
                              {{$category->name}}
                          </a>
                      </td>
                       
                     <td>
                          <a>
                              {{$category->service->name}}
                          </a>
                      </td>
                     


                      <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="{{url('/ipanel/display-categories/'.$category->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              عرض
                          </a>
                    </td>

                     <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{url('/ipanel/edit_category/'.$category->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              تعديل 
                          </a>
                    </td> 
                      <td> 
                        <a class="btn btn-danger btn-sm" href="{{url('/ipanel/delete_category/'.$category->id)}}">
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