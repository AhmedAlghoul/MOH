@extends('cms.parent')

@section('title','إضافة صلاحية جديد')

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

@section('page-name','إضافة صلاحية جديد')

@section('small-page-name','إضافة صلاحية')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">إضافة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form" role="form" method="POST" action="{{route('permissions.store')}}">
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
          <label>اسم الصلاحية</label>
          <input type="text" name="name" class="form-control" placeholder="ادخل اسم الصلاحية">
        </div>

        <div class="form-group col-md-6">
          <label>القسم</label>
          <select class="form-control" id="guards" style="width: 82%">

            <option value="web">مستخدمين</option>
            <option value="admin">مشرفين</option>
          </select>
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