@extends('cms.parent')

@section('title','تعديل دور وظيفي')

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

@section('page-name','تعديل الدور وظيفي ')

@section('small-page-name','تعديل الدور وظيفي')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">إضافة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form">
      {{-- csrf must be in the form tag --}}
      @csrf
      <div class="card-body">

        <div class="form-group ">
          <label>اسم الدور وظيفي</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="ادخل اسم الدور وظيفي"
            value="{{$role->name}}">
        </div>

        <div class="form-group col-md-6">
          <label>القسم</label>
          <select class="form-control guards" id="guards" style="width: 82%">
            <option value="web" @if($role->guard_name =='web') selected @endif >مستخدمين</option>
            <option value="admin" @if($role->guard_name =='admin') selected @endif>مشرفين</option>
          </select>
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{$role->id}})" class="btn btn-primary">تعديل</b utton>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
<!-- /.card -->



@endsection


@section('scripts')
<script>
  //Initialize Select2 Elements
$('.guards').select2({
theme: 'bootstrap4'
})
function performUpdate(id){
let data = {
name: document.getElementById('name').value,
guard: document.getElementById('guards').value
};

update('/cms/admin/roles/'+id,data,'/cms/admin/roles/');
}
</script>
@endsection