@extends('cms.parent')

@section('title','عرض مفاتيح الكادر')

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

@section('small-page-name','عرض مفاتيح الكادر')



@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">عرض مفاتيح الكادر </h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="البحث">

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
                                    <th>القسم</th>
                                    <th>المسمى الوظيفي</th>
                                    <th>نوع الاحتساب</th>
                                    <th>المفتاح</th>
                                    <th> الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($keys as $key)
                                <tr>
                                    <td>{{$key->id}}</td>

                                    <td>
                                        @if (!empty($key->departments))
                                        {{$key->departments->tb_managment_name}}
                                        @endif
                                    </td>
                                    <td>{{$key->EmployeesRoles->jobtitle_name_ar}}</td>
                                    <td>{{$key->Constants->const_name}}</td>
                                    <td>{{$key->key_value}}</td>
                                    <td>
                                        <a href="{{route('key.edit',$key->id)}}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <a href="{{route('key.edit',$key->id)}}" class="btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a> --}}
                                        {{-- using javascript method -axios --}}
                                        <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$key->id}})">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                    {{-- <td>
                                        <a href="{{route('nurses.edit',$nurse->id)}}"
                                            class="btn btn-primary btn-sm">تعديل</a>
                                        <form action="{{route('nurses.destroy',$nurse->id)}}" method="post"
                                            class="d-inline-block">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
  axios.delete('/cms/admin/key/'+id)
    .then(function (response) {
  // handle success 2xx-3xx
  console.log( response.data);
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
