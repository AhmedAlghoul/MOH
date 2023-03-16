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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
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
                <input type="hidden" class="department_id" name="department">
                <div class="col-md-6">
                    <label>القسم</label>
                    <div id="jstree">

                    </div>

                </div>
                {{-- <div class="form-group col-md-6">
                    <label for="department-choice">القسم</label>
                    <br>
                    <select class="form-control js-example-basic-single" id="department-choice" name="department">

                        @foreach ($departments as $department)
                        <option value="{{$department->tb_managment_code}}" @if ($department->tb_managment_code ==
                            $key->department_id)
                            selected @endif>{{$department->tb_managment_name}}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="col-md-6">
                    @if ($key->role_id)
                    <div class="form-group">
                        <label>المسمى الوظيفي</label>
                        <br>
                        <select class="form-control js-example-basic-single" name="role">
                            @foreach ($roles as $role)
                            <option value="{{$role->jobtitle_code}}" @if ($role->jobtitle_code == $key->role_id)
                                selected @endif>{{$role->jobtitle_name_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    @else($key->class_type)
                    <div class="form-group">
                        <label>الفئة الوظيفية</label>
                        <br>
                        <select class="form-control js-example-basic-single" name="classification">
                            @foreach ($classifications as $classification)
                            <option value="{{$classification->job_classification_id}}" @if ($classification->job_classification_id == $key->class_type)
                                selected @endif>{{$classification->job_classification_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif






                    <div class="form-group ">
                        <label>نوع الاحتساب</label>
                        <br>
                        <select class="form-control js-example-basic-single" name="calc_type">
                            @foreach ($constants as $constant)
                            <option value="{{$constant->const_id}}" @if ($constant->const_id == $key->calc_type_id )
                                selected @endif>{{$constant->const_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>مفتاح الكادر </label>
                        <input type="number" step=any min=0 name="key_value" class="form-control"
                            placeholder="أدخل مفتاح الكادر" value="{{$key->key_value}}">
                    </div>
                    <div class="form-group">
                        <label>مفتاح الكادر 2</label>
                        <input type="number" step=any min=0 name="key_value2" class="form-control"
                            placeholder="أدخل مفتاح الكادر" value="{{$key->value_col1}}">
                    </div>
                    <div class="form-group">
                        <label>مفتاح الكادر 3</label>
                        <input type="number" step=any min=0 name="key_value3" class="form-control"
                            placeholder="أدخل مفتاح الكادر" value="{{$key->value_col2}}">
                    </div>
                    <div class="form-group">
                        <label for="body">طريقة حساب المفتاح</label>
                        <textarea class="form-control tinymce-editor" rows="7" cols=" 8" name="calc_method"
                            placeholder="الرجاء إدخال طريقة حساب المفتاح">{!!$key->calc_method!!}</textarea>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label>مفتاح الكادر </label>
                    <input type="number" step=any min=0 name="key_value2" class="form-control"
                        placeholder="أدخل مفتاح الكادر" value="{{$key->value_col1}}">
                </div> --}}
                {{-- <div class="form-group">
                    <label>مفتاح الكادر </label>
                    <input type="number" step=any min=0 name="key_value3" class="form-control"
                        placeholder="أدخل مفتاح الكادر" value="{{$key->value_col2}}">
                </div> --}}

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

<script>
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
    });
</script>
<script>
    $( '#jstree' ).bind('loaded.jstree', function(e, data) {
    $('#jstree').jstree(true).select_node( {{$key->department_id}} );
    });
    //dselect_node
    // $('#jstree').('click', '.jstree-clicked', function () {
    // $('#jstree').(true).deselect_node({{$key->department_id}});
    // });
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
