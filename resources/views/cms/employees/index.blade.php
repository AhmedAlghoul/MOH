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

    <div class="col-12">
      {{-- downlad Employee names Excel file --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> عرض الموظفين </h3>
          {{-- <a class="btn btn-success" href="{{ route('file-export') }}">تحميل
            الأسماء</a> <a class="btn btn-success" href="{{ route('file-export') }}">تحميل
            الأسماء</a> --}}
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="البحث">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          {{-- start of file import export form --}}

          <form action="http://127.0.0.1:8000/cms/admin/file-import" method="POST" enctype="multipart/form-data">
            @csrf
            <br><br>
            <div class="form-group mb-4" style="max-width: 500px; ">
              <div class="custom-file text-left">
                <input type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <button class="btn btn-primary" style="width: 250px;">استيراد اكسل</button>
            <a class="btn btn-success" style="width: 250px;" href="{{asset('/cms/admin/file-export')}}">تصدير
              اكسل</a>
            <div style='float: left;'>
              <a href='/cms/admin/download' style="width: 250px;" class="btn btn-block btn-secondary ">تحميل نموذج
                الاكسل</a>
            </div>
            {{-- <button style="width: 250px;">تحميل نموذج الاكسل</button> --}}
          </form>

        </div>


        {{-- end of file import export form --}}




        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th>الرقم</th>
                <th>الرقم الوظيفي</th>
                <th>اسم الموظف</th>
                {{-- <th>تاريخ التعيين</th> --}}
                <th>المستشفى</th>
                <th>الدائرة</th>
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
                {{-- <td>{{$employee->date_of_hiring}}</td> --}}
                <td>{{$employee->hospitals->name}}</td>
                <td>{{$employee->circles->circle_name}}</td>
                <td>{{$employee->departments->name}}</td>
                <td>{{$employee->EmployeesRoles->Role_name}}</td>
                <td>{{$employee->mobile_number}}</td>
                <td>
                  <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-info">
                    <i class="fas fa-edit"></i>
                  </a>
                  {{-- <a href="{{route('key.edit',$key->id)}}" class="btn btn-info">
                    <i class="fas fa-edit"></i>
                  </a> --}}
                  {{-- using javascript method -axios --}}
                  <a href="#" class="btn btn-danger" onclick="performDestroy({{$employee->id}},this)">
                    <i class="fas fa-trash-alt"></i>
                  </a>
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
          {{$employees->links()}}
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
  function performDestroy(id,ref){
confirmDestroy('/cms/admin/employee/'+id,ref);}

</script>

{{-- <script>
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
// implement delete function using axios
function destroy(id){
axios.delete('/cms/admin/employee/'+id)
.then(function (response) {
// handle success 2xx-3xx
console.log( response.data);
Swal.fire(
'تم الحذف!',
'تم حذف الموظف بنجاح.',
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
</script> --}}

@endsection