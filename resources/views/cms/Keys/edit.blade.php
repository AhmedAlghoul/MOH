@extends('cms.parent')

@section('title','تعديل مفتاح الكادر')

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

@section('page-name','تعديل مفتاح الكادر')

@section('small-page-name','تعديل مفتاح الكادر')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">تعديل</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form" role="form" method="POST" action="{{route('key.update')}}">
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


        {{-- display all errors --}}
        {{-- <div class="alert alert-danger" class="form-group">
          <ul>
            @foreach ($errors->all() as $error)
            {{ $error }
            @endforeach
          </ul>
        </div> --}}


        <div class="form-group col-md-6">
          <label for="department-choice">القسم</label>
          <select class="form-control" id="department-choice" name="department">
            @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-6">
          <label>الدور الوظيفي</label>
          <select class="form-control" id="department-choice" name="role">
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->Role_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-6">
          <label>مفتاح الكادر </label>
          <input type="number" name="key_value" class="form-control" placeholder="أدخل مفتاح الكادر">
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