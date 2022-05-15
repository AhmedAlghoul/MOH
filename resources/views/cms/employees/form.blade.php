@extends('cms.parent')

@section('title','إضافة موظف جديد')

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

@section('page-name','إضافة موظف جديد')

@section('small-page-name','إضافة موظف')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">إضافة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form" role="form" method="POST" action="{{route('employee.store')}}">
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
          <label>الرقم الوظيفي</label>
          <input type="number" name="job_number" class="form-control" placeholder="أدخل الرقم الوظيفي">
        </div>

        <div class="form-group col-md-6">
          <label>اسم الموظف</label>
          <input type="text" name="employee_name" class="form-control" placeholder="ادخل اسم الموظف">
        </div>

        <div class="form-group col-md-6">
          <label>تاريخ التعيين</label>
          <input type="date" name="date_of_hiring" class="form-control">
        </div>



        <div class="form-group col-md-6">
          <label for="hospital-choice">اختر المستشفى</label>
          <select class="form-control" id="hospital-choice" name="hospital">
            @foreach ($hospitals as $hospital)
            <option  value="{{$hospital->id}}">{{$hospital->name}} </option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="department-choice">اختر القسم</label>
          <select class="form-control" id="department-choice" name="department">
            @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach

          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="role-choice">الدور الوظيفي</label>
          <select class="form-control" id="role-choice" name="role">
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->Role_name}}</option>
            @endforeach
          </select>
        </div> 

        {{-- <div class="form-group col-md-6">
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
        </div> --}}
        <div class="form-group col-md-6">
          <label> رقم الجوال</label>
          <input type="number" name="mobile_number" class="form-control" placeholder="أدخل رقم الجوال">
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