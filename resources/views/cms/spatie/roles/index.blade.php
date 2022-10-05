@extends('cms.parent')

@section('title','عرض الأدوار الوظيفية')

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

@section('small-page-name','عرض الأدوار الوظيفية')



@section('content')

<section class="content">
  <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">عرض الأدوار الوظيفية </h3>

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
                  <th span="1" style="width: 7%">الرقم</th>
                  <th span="1" style="width: 20%">اسم الدور الوظيفي</th>
                  <th span="1" style="width: %"> القسم</th>
                  <th>عدد الصلاحيات</th>
                  <th> الأوامر</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($roles as $role)
                <tr>
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  <td><span class="badge bg-success">{{$role->guard_name}}</span></td>
                  <td><a href="{{route('role.permissions.index',$role->id)}}"
                      class="btn btn-info">{{$role->permissions_count}}
                      صلاحية/ات</a></td>

                  <td>
                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </a>
                    {{-- we sent id to destroy method ($role->id)--}}
                    {{-- <form action="{{route('role.destroy',$role->id )}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form> --}}

                    {{-- using javascript method instead of form method --}}
                    <a href="#" class="btn btn-danger" onclick="performDestroy({{$role->id}},this)">
                      <i class="fas fa-trash-alt"></i>
                    </a>
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
            {{$roles->links()}}
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
<script>
  function performDestroy(id,ref){
 confirmDestroy('/cms/admin/roles/'+id,ref);
}
</script>
@endsection