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
          <h3 class="card-title">الخدمات المطلوبه</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped text-center projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                           الخدمات
                      </th>
                      <th>
                          إسم المستخدم
                      </th>
                      <th style="width: 20%">
                           ميعاد الإنتهاء
                      </th>
                      <th>
                          حالة المشروع
                      </th>
                      <th class="text-center">
                          عرض الخدمة
                      </th>
                      <th  class="text-center">
                          تعديل الخدمة
                      </th>
                      <th  class="text-center">
                          حذف الخدمة
                      </th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                  <tr>
                      <td>
                          1
                      </td>

                      <td>
                          <a>
                            {{$order->category->name}}
                          </a>
                          <br/>
                          <b>
                              {{$order->beginOrderDate()}}
                          </b>
                      </td>
                     
                      
                     
                      <td class="project_progress">
                          <!-- <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                              </div>
                          </div> -->
                          <h5>
                          {{$order->user->name}}
                          </h5>
                      </td>

                      <td>
                          
                          <b>
                              {{$order->endOrderDate() }}
                          </b>
                      </td>

                      <td class="project-state">
                          @if($order->status == 'success')
                          <span class="badge badge-success">Success</span>
                          @elseif($order->status == 'ordered')
                          <span class="badge badge-info">ordered</span>
                          @else
                          <span class="badge badge-danger">refused</span>

                          @endif
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              عرض
                          </a>
                    </td>
                    <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              تعديل 
                          </a>
                    </td> 

                    <td class="project-actions text-center">
                          <a class="btn btn-danger btn-sm" href="#">
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