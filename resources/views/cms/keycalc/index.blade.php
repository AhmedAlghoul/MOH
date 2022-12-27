@extends('cms.parent')

@section('title','عرض نتائج حساب المفتاح')

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

  .form-control {
    width: 40%;
  }

  .card-title {
    float: right;
    font-size: 25px;
  }
</style>
@endsection


@section('page-name','عرض نتائج حساب مفتاح الكادر')

@section('small-page-name','عرض النتائج')



@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">عرض النتائج</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form id="create-form" role="form" method="GET" action="#">
      {{-- csrf must be in the form tag --}}
      @csrf
      <div class="card-body form-row">

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible col-md-12 ">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
            style="position: relative">×</button>
          <h5><i class="icon fas fa-ban"></i>تنبيه!</h5>
          <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
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

        <div class="form-group col-md-6">
          <label for="hospital-choice">اختر المستشفى</label>
          <select class="form-control" id="hospital-choice" name="hospital">
            <option name="hospital" id="hospital-choice" selected> اختر المستشفى </option>
            @foreach ($hospitals as $hospital)

            <option value="{{$hospital->id}}">{{$hospital->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="department-choice">اخترالدور الوظيفي </label>
          <select class="form-control" id="department-choice" name="department">
            <option name="circle" id="circle-choice" selected> اختر الدور الوظيفي </option>
            @foreach ($employeeroles as $employeerole)

            <option value="{{$employeerole->id}}">{{$employeerole->Role_name}}</option>
            @endforeach
          </select>
        </div>

        {{-- <div class="form-group col-md-6">
          <label for="department-choice">اختر الدائرة </label>
          <select class="form-control" id="department-choice" name="department">
            <option name="circle" id="circle-choice" selected> اختر الدائرة </option>
            @foreach ($circles as $circle)

            <option value="{{$circle->id}}">{{$circle->circle_name}}</option>
            @endforeach
          </select>
        </div> --}}

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        {{-- //when press on submit button it should go to page due to the action in the form tag --}}
        <button type="submit" class="btn btn-primary">اختيار</button>
      </div>

    </form>
  </div>
  <!-- /.card -->
</div>
<!-- /.card -->
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
