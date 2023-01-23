@extends('cms.parent')

@section('title','تعديل مفتاح كادر ')

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
            <h3 class="card-title">تعديل مفتاح الكادر</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="create-form" role="form" method="POST" action="{{route('key.update',$key->id)}}">
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
                    <label for="department-choice">القسم</label>
                    <br>
                    <select class="form-control js-example-basic-single" id="department-choice" name="department">

                        @foreach ($departments as $department)
                        <option value="{{$department->tb_managment_code}}" @if ($department->tb_managment_code ==
                            $key->department_id)
                            selected @endif>{{$department->tb_managment_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>المسمى الوظيفي</label>
                    <br>
                    <select class="form-control js-example-basic-single" name="role">
                        @foreach ($roles as $role)
                        <option value="{{$role->jobtitle_code}}" @if ($role->jobtitle_code == $key->role_id)
                            selected @endif>{{$role->jobtitle_name_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>نوع الاحتساب</label>
                    <br>
                    <select class="form-control js-example-basic-single" name="calc_type">
                        @foreach ($constants as $constant)
                        <option value="{{$constant->const_id}}" @if ($constant->const_id == $key->calc_type_id )
                            selected @endif>{{$constant->const_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>مفتاح الكادر </label>
                    <input type="number" step=any min=0 name="key_value" class="form-control"
                        placeholder="أدخل مفتاح الكادر" value="{{$key->key_value}}">
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
@push('js')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
