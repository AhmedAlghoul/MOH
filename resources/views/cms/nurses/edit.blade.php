@extends('cms.parent')

@section('title','تعديل بيانات ممرض')

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

@section('page-name','تعديل بيانات ممرض')

@section('small-page-name','تعديل بيانات ممرض')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">تعديل</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form" role="form" method="POST" action="{{route('nurse.update'),$nurse->id}}">
      {{-- csrf must be in the form tag --}}
      @csrf
      @method('PUT')
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
          <input type="number" name="job_number" class="form-control" placeholder="أدخل الرقم الوظيفي" value="{{$nurse->job_number}}">
        </div>

        <div class="form-group col-md-6">
          <label>اسم الممرض</label>
          <input type="text" name="name" class="form-control" placeholder="ادخل اسم الممرض">
        </div>
{{-- 
        <div class="form-group col-md-6">
          <label>تاريخ التعيين</label>
          <input type="date" name="date_of_hiring" class="form-control">
        </div>
 --}}


        <div class="form-group col-md-6">
          <label>المستشفى</label>
          <input type="text" name="Hospital_name" class="form-control" placeholder="ادخل اسم المستشفى">
        </div>

        <div class="form-group col-md-6">
          <label>القسم</label>
          <input type="text" name="Section_name" class="form-control" placeholder="ادخل اسم القسم">
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

        <div class="form-check ">
          <input type="checkbox" class="form-check-input" id="check">
          <label class="form-check-label" for="check">تم التأكد من صحة البيانات</label>
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