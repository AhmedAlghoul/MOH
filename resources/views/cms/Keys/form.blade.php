@extends('cms.parent')

@section('title','إضافة مفتاح كادر جديد')

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection

@section('page-name','إضافة مفتاح كادر جديد')

@section('small-page-name','إضافة مفتاح كادر')

@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary" id="form-card">
        <div class="card-header">
            <h3 class="card-title">إضافة</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="create-form" role="form" method="POST" action="{{route('key.store')}}">
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
                <div class="form-group col-md-12">
                    <label for="calculation_method">اختر طريقة الحساب</label>
                    <select class="form-control " id="calculation_method">
                        <option value="">اختر طريقة الحساب</option>
                        <option value="1">فئة وظيفية</option>
                        <option value="2">مسمى وظيفي</option>

                    </select>
                </div>



                <div class="col-md-6 ">
                    <label for="imported_data">المسمى الوظيفي/الفئة الوظيفية</label>
                    <br>
                    <select class="form-control js-example-basic-single" id="imported_data" name="Data">
                        {{-- @foreach ($roles as $role)
                        <option value="{{$role->jobtitle_code}}">{{$role->jobtitle_name_ar}}</option>
                        @endforeach --}}
                    </select>
                    <br>
                    <label>نوع الاحتساب</label>
                    <br>
                    <select class="form-control js-example-basic-single " name="calc_type">
                        @foreach ($constants as $constant)
                        <option value="{{$constant->const_id}}">{{$constant->const_name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label>مفتاح الكادر </label>
                    <input type="number" step=any min=0 name="key_value" class="form-control"
                        placeholder="أدخل مفتاح الكادر">

                    <label>مفتاح الكادر </label>
                    <input type="number" step=any min=0 name="key_value2" class="form-control"
                        placeholder="مفتاح الكادر إذا وجد">

                    <label>مفتاح الكادر </label>
                    <input type="number" step=any min=0 name="key_value3" class="form-control"
                        placeholder="مفتاح الكادر إذا وجد">

                    <div class="form-group">
                        <label for="body">طريقة حساب المفتاح</label>
                        <textarea class="form-control tinymce-editor" rows="7" name="calc_method"
                            placeholder="الرجاء إدخال طريقة حساب المفتاح"></textarea>
                    </div>
                </div>

                <input type="hidden" class="department_id" name="department">

                <div class="col-md-6">
                    <label>القسم</label>
                    <div id="jstree">

                    </div>

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
<script>
    $('#calculation_method').change(function () {
    var choice_id = $(this).val();
    console.log(choice_id);
    $.ajax({
        url: "{{route('getData')}}",
        type: "get",
        data: {
        choice_id: choice_id
},
success: function(data) {
    var DataSelect = $('#imported_data');
    // Clear any existing options in the select element
        DataSelect.empty();
    // Iterate over the returned data and create an option element for each item

    if (data.classifications){
         $.each(data.classifications, function(index, item) {
        DataSelect.attr('name', 'classification');
            // Create the option element
                var option = $('<option>', {
                    value: item.job_classification_id,
                    text: item.job_classification_name
                    });

    // Add the option element to the select element
        DataSelect.append(option);
                });
                $('label[for="imported_data"]').text('الفئة الوظيفية');
      }
      else if (data.jobtitles){
        DataSelect.attr('name', 'role');
        $.each(data.jobtitles, function(index, item) {
                // Create the option element
                var option = $('<option>', {
                    value: item.jobtitle_code,
                    text: item.jobtitle_name_ar
            });

            // Add the option element to the select element
            DataSelect.append(option);
            });
            $('label[for="imported_data"]').text('المسمى الوظيفي');
    }

    },
});
});
// success: function(data) {
//     if (choice_id == 1) {
//     // Change the label to "الفئة الوظيفية"
//     $('label[for="department-choice"]').text('الفئة الوظيفية');
//     }
//     else if (choice_id == 2) {
//     // Change the label to "المسمى الوظيفي"
//     $('label[for="department-choice"]').text('المسمى الوظيفي');

//     }
// //             $('select[name="department"]').empty();
// //             $.each(data, function(key, value) {
// //             $('select[name="department"]').append('<option value="' +
// //                                                             value + '">' + value + '</option>');
// // });
// },

// });
// });



    $(document).ready(function(){
    let url ="{{route('treeview')}}";
    console.log(url);
    $('#jstree').jstree({
    "core" : {
    'data' : {
    'url' : url,
    'data' : function (node) {
    console.log(node);
    return { 'parent' : node.id };
    }
    },
    "themes" : {
    "theme" : "default",
    "icons" : false
    }
    }
    // "plugins" : [ "wholerow" ]
    });

    });

  $('#jstree').on('changed.jstree', function(e, data) {
    var selectedIds = data.selected;
    console.log(selectedIds);
    $('.department_id').val(selectedIds);
    // $.ajax({
    //     type: "POST",
    //     url: "{{route('key.store')}}",
    //     data: { id: selectedId },
    //     success: function(response) {
    //     // console.log(response);

    //     }
    //     });

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js"
    integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    tinymce.init({
                selector: 'textarea.tinymce-editor',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount', 'image'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignright aligncenter ' +
                    'alignleft alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
</script>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
