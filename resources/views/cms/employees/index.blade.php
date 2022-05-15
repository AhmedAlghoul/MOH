@extends('cms.parent')

@section('title','عرض الموظفين')

@section('styles')
<style>
  .card-title {
    font-size: 20px;
    font-weight: bold;
    float: right;
  }

  .card-header>.card-tools {
    float: left;
  }
</style>
@endsection


@section('page-name','عرض')

@section('small-page-name','عرض الموظفين')



@section('content')

<section class="content">
  <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">عرض الموظفين </h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="البحث">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>الرقم</th>
                  <th>الرقم الوظيفي</th>
                  <th>اسم الموظف</th>
                  <th>تاريخ التعيين</th>
                  <th>المستشفى</th>
                  <th>القسم</th>
                  <th> الدور الوظيفي</th>
                  <th>رقم الجوال</th>
                  <th> الأوامر</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($employees as $employee)
                <tr>
                  <td>{{$employee->id}}</td>
                  <td>{{$employee->job_number}}</td>
                  <td>{{$employee->employee_name}}</td>
                  <td>{{$employee->date_of_hiring}}</td>

                  <td>{{$employee->hospitals->name}}</td>
                  <td>{{$employee->departments->name}}</td>
                  <td>{{$employee->Roles->Role_name}}</td>
                  <td>{{$employee->mobile_number}}</td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button type="button" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>

                  {{-- <td>
                    <a href="{{route('nurses.edit',$nurse->id)}}" class="btn btn-primary btn-sm">تعديل</a>
                    <form action="{{route('nurses.destroy',$nurse->id)}}" method="post" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                  </td> --}}


                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->


  </div>
</section>


@endsection


@section('scripts')

@endsection