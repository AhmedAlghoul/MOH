@extends('cms.parent')

@section('title','تعديل قسم')

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

@section('page-name','تعديل قسم')

@section('small-page-name','تعديل قسم')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">تعديل</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form" role="form" method="POST" action="{{route('department.update',$department->id)}}">
      {{-- csrf must be in the form tag --}}
      @csrf
      @method('PUT')
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
          <label>اسم القسم</label>
          <input type="text" name="name" class="form-control" placeholder="ادخل اسم القسم"
            value="{{$department->name}}">
        </div>

        <div class="form-group">
          <label for="department_description">الوصف الوظيفي للقسم:</label>
          <textarea class="form-control" rows="5" name="department_description" id="department_description"
            placeholder="الرجاء ادخال الوصف الوظيفي للقسم">{{$department->department_description}}</textarea>
        </div>

        <div class="form-check ">
          <input type="checkbox" name="is_active" class="form-check-input" id="check" @if($department->is_active)
          @checked(true) @endif>
          <label class=" form-check-label" for="check">نشط</label>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
<!-- /.card -->



@endsection


@section('scripts')

@endsection