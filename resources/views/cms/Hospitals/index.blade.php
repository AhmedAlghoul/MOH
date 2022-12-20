@extends('cms.parent')

@section('title','عرض المرافق')

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

@section('small-page-name','عرض المرافق')



@section('content')

<section class="content">
  <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">عرض المرافق </h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-success" style="width: 250px;" href="{{route('hospitlasexport')}}">تصدير
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
            {{-- //Recepion error message from controller --}}
            @if ($errors->any())
            <div class="alert alert-danger">

              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            @if (session('success'))

            <div class="alert alert-success alert-dismissible col-md-12">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> رسالة تأكيد!</h5>
              {{ session('success') }}
            </div>
            @endif

            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>الرقم</th>
                  <th>اسم المرفق</th>
                  <th>الأقسام</th>
                  <th>الأوامر</th>
                </tr>
              </thead>
              <tbody>
                @isset($hospitals)

                @foreach ($hospitals as $hospital)
                <tr>
                  <td>{{$hospital->id}}</td>
                  <td>{{$hospital->name}}</td>
                  <td>
                    <ul>
                      @isset($hospital->departments)
                      @foreach ($hospital->departments as $department)
                      <li>{{$department->name}}</li>
                      @endforeach
                      @endisset
                    </ul>
                  </td>
                  <td>
                    <a href="{{route('hospital.edit',$hospital->id)}}" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('hospital.delete',$hospital->id)}}" class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
                @endisset


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
  // $(document).on('click', '.deleteProduct', function (e) {
// e.preventDefault();
// var $this = $(this);

// var posted_data = {
// _token: $("meta[name='csrf-token']").attr("content"),
// }

// var title = '';

// if(lang == '_en'){
// title = 'Are you sure to delete the product?';
// }else{
// title = 'هل أنت متأكد من حذف المنتج ؟';
// }

// swal({
// title: title,
// icon: "warning",
// dangerMode: true,
// buttons: ["{{__('lang.cancel')}}", "{{__('lang.confirm')}}"]
// })
// .then((process) => {
// if(!process){
// return;
// }

// $.post($("meta[name='BASE_URL']").attr("content") + "/admin/products/" + $this.attr('data-id') + "/destroy",
// posted_data, function(response){
// getData();
// toastr.success(response.message)

// });
// });
// });



  //   function confirmDestroy(id){
//   Swal.fire({
//       title: 'هل أنت متأكد؟',
//       text: "لن تستطيع عكس عملية الحذف مرة أخرى!",
//       icon: 'warning',
//       showCancelButton: true,
//       cancelButtonText: 'إلغاء',
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'نعم, قم بالحذف!',
//     }).then((result) => {
//   if (result.isConfirmed) {
//     destroy(id);
//     // showSuccessMessage();

//  }})
// }
// //  implement delete function using axios
// function destroy(id){
//   axios.delete('/cms/admin/hospital/'+id)
//     .then(function (response) {
//   // handle success 2xx-3xx
//   console.log( response.data);
//   Swal.fire(
//     'تم الحذف!',
//     'تم حذف المستشفى بنجاح.',
//     'success'
//   )
//   location.reload();

//   })
//   .catch(function (error) {
//   // handle error 4xx-5xx
//     console.log(error);
//   })
//   .then(function () {
//   // always executed
//   });

// }

// function showSuccessMessage(){
// Swal.fire({
//   position: 'center',
//   icon: 'success',
//   title: 'تمت العملية بنجاح',
//   showConfirmButton: false,
//   timer: 1500
// });
// }
</script>
@endsection
