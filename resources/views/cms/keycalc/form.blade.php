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
                        <option name="hospital" id="hospital-choice" selected> اختر المستشفى </option>
                        @foreach ($hospitals as $hospital)
                        
                        <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="department-choice">اختر القسم</label>
                    <select class="form-control" id="department-choice" name="department">

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="role-choice">الدور الوظيفي</label>
                    <select class="form-control" id="role-choice" name="role">
                        @foreach ($roles as $role)
                        <option value="{{$role->Role_name}}">{{$role->Role_name}} </option>
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
{{-- <script>
    $(document).ready(function() {
            $('select[name="hospital"]').on('change', function() {
                var hospital_id = $(this).val();
                if (hospital_id) {
                    $.ajax({
                        url: "{{ URL::to('hospital') }}/" + hospital_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="department"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="department"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
</script> --}}


<script>
    //write ajax request to get departments choices according to the hospital 
    $('#hospital-choice').change(function () {
        var hospital_id = $(this).val();
        $.ajax({
            url: "{{route('getDepartments')}}",
            type: "get",
            data: {
                hospital_id: hospital_id
            },
            success: function(data) {
            $('select[name="department"]').empty();
            $.each(data, function(key, value) {
            $('select[name="department"]').append('<option value="' +
                                                value + '">' + value + '</option>');
            });
            },
            // success: function (data) {
            //     $('#department-choice').html(data);
            // }
        });
    });

    //write javascript code to show data of the employee in the table
    // $('#create-form').submit(function (e) {
    //     e.preventDefault();
    //     var hospital_id = $('#hospital-choice').val();
    //     var department_id = $('#department-choice').val();
    //     var role = $('#role-choice').val();
    //     $.ajax({
    //         url: "{{route('keycalc.getEmployeeRole')}}",
    //         type: "get",
    //         data: {
    //             hospital_id: hospital_id,
    //             department_id: department_id,
    //             role: role
    //         },
    //         success: function (data) {
    //             $('#employee-table').html(data);
    //         }
    //     });
    // });
    
</script>
@endsection