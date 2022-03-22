@extends('cms.parent')

@section('title','عرض الأقسام')

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

@section('small-page-name','عرض الأقسام')



@section('content')

<section class="content">
  <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">عرض الأقسام </h3>

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
                  <th>اسم القسم</th>
                  <th>الفعالية</th>
                  <th> الأوامر</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($departments as $department)
                <tr>
                  <td>{{$department->id}}</td>
                  <td>{{$department->name}}</td>

                  <td>@if ($department->is_active)
                    <span class="badge badge-success">نشط</span>
                    @else
                    <span class="badge badge-danger">غير نشط</span>
                    @endif
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                      </button>
                      {{-- we sent id to destroy method $department->id--}}
                      <form action="{{route('department.destroy',$department->id )}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>

                    </div>
                  </td>
                </tr>
                @endforeach 
                {{-- <td>
                  <a href="{{route('nurses.edit',$nurse->id)}}" class="btn btn-primary btn-sm">تعديل</a>
                  <form action="{{route('nurses.destroy',$nurse->id)}}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                  </form>
                </td> --}}
                {{--

                --}}
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