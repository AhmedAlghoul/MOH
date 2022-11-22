@extends('cms.parent')

@section('title','إضافة مستخدم جديد')

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

@section('page-name','إضافة مستخدم جديد')

@section('small-page-name','إضافة مستخدم')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">إضافة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form" role="form" method="POST" action="{{route('users.store')}}">
      {{-- csrf must be in the form tag --}}
      @csrf
      <div class="card-body">


        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible ">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> تنبيه!</h5>
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

        <div class="form-group ">
          <label>اسم المستخدم</label>
          <input type="text" name="name" class="form-control" placeholder="ادخل اسم المستخدم">
        </div>
        <div class="form-group ">
          <label>رقم الهوية</label>
          <input type="number" name="idnumber" class="form-control" placeholder="ادخل رقم الهوية">
        </div>

        <div class="form-group ">
          <label>رقم الجوال</label>
          <input type="number" name="mobile" class="form-control" placeholder="ادخل رقم الجوال">
        </div>

        <div class="form-group">
          <label>الدور الوظيفي</label>
          <select class="form-control" id="role-choice" name="role_id">
            <option  id="role-choice" selected> اختر الدور الوظيفي </option>
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="password">كلمة السر</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-check ">
          <input type="checkbox" name="is_active" class="form-check-input" id="check">
          <label class="form-check-label" for="check">نشط</label>
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
