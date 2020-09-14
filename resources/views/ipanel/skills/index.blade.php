@extends('ipanel.layouts.master')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> المهارات</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active"> المهارات</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">كل المهارات </h3>
                <div class="card-tools">
          <a href="{{url('ipanel/add-skill')}}">
            <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
                <span>إضافة مهارة</span>
                </button>
              </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>المهارة</th>
                      <th>التقدم</th>
                      <th style="width: 40px">النسبة</th>
                      <th style="width: 40px">تعديل</th>
                      <th style="width: 40px">حذف</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($skills as $skill)

                      <tr>
                                <td>{{++$cnt}}</td>
                              <td>{{$skill->name}}</td>

                              <td>

                              <div class="progress progress-xs">

                              @if($skill->value <= 30)
                                <div class="progress-bar bg-primary" style="width: {{$skill->value}}%"></div>
                              @elseif($skill->value >= 30 && $skill->value <= 70)
                                <div class="progress-bar bg-warning" style="width: {{$skill->value}}%"></div>
                              @else
                                <div class="progress-bar bg-success" style="width: {{$skill->value}}%"></div>
                              @endif

                                </div>

                              </td>


                              <td>
                              @if($skill->value <= 30)
                              <span class="badge bg-primary">{{$skill->value}}%</span>
                              @elseif($skill->value >= 30 && $skill->value <= 70)
                              <span class="badge bg-warning">{{$skill->value}}%</span>
                              @else
                              <span class="badge bg-success">{{$skill->value}}%</span>
                              @endif
                              </td>

                            <td class="project-actions text-center">
                                  <a class="btn btn-info btn-sm" href="{{url('/ipanel/edit-skill/'.$skill->id)}}">
                                      <i class="fas fa-pencil-alt">
                                      </i>
                                      تعديل 
                                  </a>
                            </td> 
                        <td> 
                          <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash">
                                      </i>
                                      حذف 
                                  </a>
                        </td>


                    </tr>
                

                      @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div> -->
            <!-- /.card -->

          </div>
      
          <!-- /.col -->
        </div>
        <!-- /.row -->
     
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection