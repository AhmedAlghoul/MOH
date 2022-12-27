@extends('cms.parent')

@section('title','عرض النتائج')

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

@section('page-name','عرض نتائج حساب المفتاح')

@section('small-page-name','عرض النتائج')

@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary" id="form-card">
        <div class="card-header">
            <h3 class="card-title">عرض النتائج</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form id="create-form" role="form" method="GET" action="{{route('keycalc.getEmployeeRole')}}">
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

                <div class="form-group col-md-6">
                    <label for="hospital-choice">اختر المرفق</label>
                    <select class="form-control" id="hospital-choice" name="hospital">
                        <option name="hospital" id="hospital-choice" selected> اختر المرفق </option>
                        @foreach ($hospitals as $hospital)

                        <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                {{-- //when press on submit button it should go to page due to the action in the form tag --}}
                <button type="submit" class="btn btn-primary">اختيار</button>
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
