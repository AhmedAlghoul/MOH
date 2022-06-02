@extends('cms.parent')

@section('title','حساب مفتاح الكادر البشري')

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

@section('page-name','حساب مفتاح الكادر البشري')

@section('small-page-name','حساب مفتاح الكادر')

@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary" id="form-card">
        <div class="card-header">
            <h3 class="card-title">حساب المفتاح</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{-- role="form" method="POST" action="#" --}}
        <form id="create-form">
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
                    <label for="hospital-choice">اختر المستشفى</label>
                    <select class="form-control" id="hospital-choice" name="hospital">

                        <option></option>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="department-choice">اختر القسم</label>
                    <select class="form-control" id="department-choice" name="department">
                        <option></option>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="role-choice">الدور الوظيفي</label>
                    <select class="form-control" id="role-choice" name="role">
                        <option></option>
                    </select>
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
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