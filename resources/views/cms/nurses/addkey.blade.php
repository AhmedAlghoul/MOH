@extends('cms.parent')

@section('title','')

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


@section('page-name','Title')

@section('small-page-name','title')



@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary" id="form-card">
        <div class="card-header">
            <h3 class="card-title">إضافة</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="create-form" role="form" method="POST" action="{{route('department.store')}}">
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
                    <label>اسم القسم</label>
                    <input type="text" name="name" class="form-control" placeholder="ادخل اسم القسم">
                </div>
                <div class="form-group ">
                    <label>النسبة لكل (ممرض/سرير)</label>
                    <input type="text" name="percentage" class="form-control" placeholder="ادخل المفتاح">
                </div>
                <div class="form-group ">
                    <label>الوصف الوظيفي</label>
                    <input type="text" name="department_description" class="form-control"
                        placeholder="الرجاء كتابة الوصف الوظيفي للقسم">
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


@endsection


@section('scripts')

@endsection