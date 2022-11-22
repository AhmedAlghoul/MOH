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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-success" style="width: 250px;" href="{{route('departmentsexport')}}">تصدير
              اكسل</a>
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
                  <th span="1" style="width: 20%">اسم القسم</th>
                  <th span="1" style="width: 55%">الوصف الوظيفي</th>
                  <th>الفعالية</th>
                  <th> الأوامر</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($departments as $department)
                <tr>
                  <td>{{$department->id}}</td>
                  <td>{{$department->name}}</td>
                  <td>{{$department->department_description}}</td>

                  <td>@if ($department->is_active)
                    <span class="badge badge-success">نشط</span>
                    @else
                    <span class="badge badge-danger">غير نشط</span>
                    @endif
                  </td>
                  <td>
                    
                    <a href="{{route('department.edit',$department->id)}}" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </a>
                    {{-- we sent id to destroy method ($department->id)--}}
                    {{-- <form action="{{route('department.destroy',$department->id )}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form> --}}

                    {{-- using javascript method instead of form method --}}
                    <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$department->id}})">
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
            {{$departments->links()}}
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
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}

<script>
  function confirmDestroy(id){
  Swal.fire({
      title: 'هل أنت متأكد؟',
      text: "لن تستطيع عكس عملية الحذف مرة أخرى!",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'إلغاء',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم, قم بالحذف!',
    }).then((result) => {
  if (result.isConfirmed) {
    destroy(id);
    // showSuccessMessage();

 }})
}
//  implement delete function using axios
function destroy(id){
  axios.delete('/cms/admin/department/'+id)
    .then(function (response) {
  // handle success 2xx-3xx 
  console.log(response.data);
  Swal.fire(
    'تم الحذف!',
    'تم حذف القسم بنجاح.',
    'success'
  )
  location.reload();
  
  })
  .catch(function (error) {
  // handle error 4xx-5xx 
    console.log(error);
  })
  .then(function () {
  // always executed
  });

}

function showSuccessMessage(){
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'تمت العملية بنجاح',
  showConfirmButton: false,
  timer: 1500
});
}
</script>
@endsection