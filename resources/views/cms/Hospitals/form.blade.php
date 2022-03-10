@extends('cms.parent')

@section('title','إضافة ممرض جديد')

@section('styles')
<style>
  .form-control {
    width: 40%;
  }

  .card-title {
    float: right;
    font-size: 25px;
  }
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
    <form id="create-form" role="form">
      <div class="card-body form-row">
        <div class="form-group col-md-6">
          <label>اسم المستشفى</label>
          <input type="text" class="form-control" placeholder="ادخل اسم المستشفى">
        </div>
        <div class="form-group col-md-6">
          <label>الرقم الوظيفي</label>
          <input type="number" class="form-control" placeholder="أدخل الرقم الوظيفي">
        </div>



        <div class="form-group col-md-6">
          <label>تاريخ التعيين</label>
          <input type="date" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label>المستشفى</label>
          <select class="form-control">
            <option>Default select</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>القسم</label>
          <select class="form-control">
            <option>Default select</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label> رقم الجوال</label>
          <input type="number" class="form-control" placeholder="أدخل رقم الجوال">
        </div>

        <div class="form-check ">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label">تم التأكد من صحة البيانات</label>
        </div>
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

@endsection