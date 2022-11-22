@extends('cms.parent')

@section('title','عرض صلاحيات الأدوار الوظيفية')

@section('styles')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
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


@section('page-name','عرض صلاحيات الأدوار الوظيفية')

@section('small-page-name','عرض صلاحيات الأدوار الوظيفية')



@section('content')

<section class="content">
  <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">عرض صلاحيات الأدوار الوظيفية </h3>

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
                  <th>الصلاحيات المُعينة</th>

                </tr>
              </thead>
              <tbody>

                @foreach ($permissions as $permission)
                <tr>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>
                  <td>
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="permission_{{$permission->id}}"
                        onchange="performStore({{$role_id}},{{$permission->id}})" @if($permission->assigned) checked @endif>

                      <label for="permission_{{$permission->id}}">
                      </label>
                    </div>
                  </td>
                </tr>
                @endforeach

              </tbody>

            </table>
            {{$permissions->links()}}
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
  function performStore(roleId, permissionId){
    // let role = request();
    // console.log("Role : ");
let data = {
permission_id: permissionId,
};

store('/cms/admin/role/'+roleId+'/permissions',data);
}
</script>
@endsection