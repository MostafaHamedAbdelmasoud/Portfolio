@extends('ipanel.layouts.master')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>أخر الأعمال</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">لوحة الرئيسية</a></li>
              <li class="breadcrumb-item active">أخر الأعمال</li>
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
          <h3 class="card-title">أعمالي </h3>

          <div class="card-tools">

          <a href="{{url('ipanel/add_work')}}">
            <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
                <span>إضافة عمل جديدة</span>
            </button>
          </a>

          <!-- <form action=""> -->

          


            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

          </div>
        </div>
        <div class="card-body p-0">

        

          <table class="table table-striped text-center projects w-100" >
              <thead>
                  <tr>
                
                  
                      <!-- <th style="width: 1%">
                          تحديد
                      </th> -->
                      <th style="width: 1%">
                          #
                      </th>
                      <th >
                            
                      </th>
                      <th >
                          عنوان العمل
                      </th>
                      <th style="width:30%;">
                          وصف العمل
                      </th>
                      <th >
                        الفئة
                      </th>
                      <th >
                        الحاله  
                      </th>
                      <th  class="text-center">
                          عرض العمل
                      </th>
                      <th  class="text-center">
                          تعديل العمل
                      </th>
                      <th class="text-center">
                          حذف العمل
                      </th>
                      <th style="width: 1%">
                      </th>
                  </tr>
              </thead>
              <tbody>

              @foreach($works as $work)
                  <tr>
                      <!-- <td>
                            <input type="checkbox" name="data[]"/>
                      </td> -->
              <!-- </form> -->

                      <td>
                          {{++$cnt}}
                      </td>

                       <td>
                          <img src="{{asset('images/'.$work->image)}}" width="30px" height="30px" />
                      </td>
                      
                      
                      <td>
                          <a>
                              {{$work->title}}
                          </a>
                      </td>

                      <td>
                          <a>
                          {!!htmlspecialchars_decode($work->work_description)  !!}
                          </a>
                      </td>

                      <td>
                      {{$work->category->name}}
                      </td>
                     
                      <td>
                        @if($work->last_work_flag ==1)
                        <a class="btn btn-danger btn-sm" href="{{asset('/ipanel/RemoveFromLastWorks/'.$work->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              إزاله من أخر الأعمال
                            </a> 
                            @else
                            <a class="btn btn-success btn-sm" href="{{asset('/ipanel/addToLastWorks/'.$work->id)}}">
                                <i class="fas fa-folder">
                                </i>
                                إضافة إلى أخر الأعمال
                            </a>


                          @endif
                      </td>

                     
                     
                      <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="{{asset('/ipanel/show_work/'.$work->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              عرض
                          </a>
                    </td>

                    <td class="project-actions text-center">
                          <a class="btn btn-info btn-sm" href="{{asset('/ipanel/edit_work/'.$work->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              تعديل 
                          </a>
                    </td> 
                <td> 
                  <a class="btn btn-danger btn-sm" href="{{asset('/ipanel/delete_work/'.$work->id)}}">
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