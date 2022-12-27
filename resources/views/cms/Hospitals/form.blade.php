@extends('cms.parent')

@section('title','إضافة مستشفى جديد')

@section('styles')
<style>
  .form-control {
    width: 40%;
  }

  .card-title {
    float: right;
    font-size: 25px;
  }

  /*add new section button style start*/
  #add-btn {
    width: 128px !important;
    max-width: 100% !important;
    max-height: 100% !important;
    height: 40px !important;
    background: #007bff;
    text-align: center;
    padding: 0px;
    font-size: 15px;
    font-weight: bold;

  }

  /*button style end*/
</style>

@endsection

@section('page-name','إضافة مستشفى جديد')

@section('small-page-name','إضافة مستشفى ')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">إضافة</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form id="create-form" role="form" action="{{route('hospital.store')}}" method="POST">
      @csrf
      <div class="card-body ">

        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>

        @endif

        <div class="form-group form-inline" style="padding-bottom: 20px">
          <label style="padding-left: 20px ">اسم المرفق</label>
          <input style="width: 500px" type="text" class="form-control " placeholder="ادخل اسم المرفق"
            name="hospital_name">
        </div>


        <div class="form-group " style="width: 100%; height: 20px; border-top: 1px solid black;  text-align: right">
          <span style=" font-size: 16px; font-weight: bold;  padding: 0 10px;">
            الأقسام
            <!--Padding is optional-->
          </span>
        </div>
        <div class="form-group col-md-12">
          <label for="department-choice">اختر الاقسام</label>
          <select class="form-control js-example-basic-single multiple" id="department-choice" multiple name="department[]">
            @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach

          </select>
        </div>

        {{-- <div id="addsection" class="form-inline " style="padding-bottom: 20px">
          <label style="padding-left: 55px  " class="form-group ">اسم القسم</label>
          <input style="width: 500px; " type="text" class="form-control " placeholder="ادخل اسم القسم">
          <br> <br> <br>
        </div>
        --}}

        {{-- <div class="form-group">
          <button type="button" id="add-btn" class="btn btn-primary" style="margin-right: 280px"><i
              class="fas fa-plus"></i> &nbsp;إضافة قسم
            جديد</button>
        </div> --}}

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">إضافة</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
<!-- /.card -->

@endsection


@section('scripts')
<script>

  // $(document).ready(function(){
  //   $('#add-btn').click(function(){
  //     var new_section = '<div class="form-inline " style="padding-bottom: 20px">'+
  //     '<label style="padding-left: 55px  " class="form-group ">اسم القسم</label>'+
  //     '<input style="width: 500px; " type="text" class="form-control " placeholder="ادخل اسم القسم">'+
  //     '</div>';
  //     $('#addsection').append(new_section);
  //     //add delete button to each section added new and make it work properly
  //     $('#addsection').find('.form-inline').last().append('<button type="button" class="btn btn-danger" style="margin-right: 15px"><i class="fas fa-trash-alt"></i> &nbsp;حذف</button>');
  //     //make delete button work
  //     $('#addsection').find('.form-inline').last().find('.btn-danger').click(function(){
  //       $(this).parent().remove();
  //     });
  //   });
  // });
</script>

@endsection
@push('js')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
