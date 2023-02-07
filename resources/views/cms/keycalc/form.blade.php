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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection

@section('page-name','حساب مفتاح الكادر البشري')

@section('small-page-name','حساب مفتاح الكادر')

@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary" id="form-card">
        <div class="card-header">
            <button style="float: left" type="button" class="btn btn-default">
                طريقة حساب المفتاح </button>
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
                <div class="col-md-4 ">
                    <label>المسمى الوظيفي</label>
                    <br>
                    <select class="form-control js-example-basic-single" id="roleChoice" name="role">
                        @foreach ($roles as $role)
                        <option value="{{$role->jobtitle_code}}">{{$role->jobtitle_name_ar}}</option>
                        @endforeach
                    </select>
                    <div id="data-container"></div>
                    <div id="data-input"></div>

                    {{-- <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </form> --}}
                </div>



                {{-- start of the new code-JS tree --}}
                <input type="hidden" class="department_id" name="department">
                <div id="jstree" class="col-md-8">

                </div>

                {{-- <button>demo button</button> --}}

                {{-- End of new code-JS tree --}}

                {{-- start of the old code --}}
                {{-- <div class="form-group col-md-6">
                    <label for="managmentCode">اختر </label>
                    <select class="form-control js-example-basic-single" id="managmentCode" name="managmentCode">
                        <option> اختر </option>
                        @foreach ($managments as $managment)

                        <option value="{{$managment->tb_managment_code}}">{{$managment->tb_managment_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 generalChoice d-none">
                    <label for="generalChoice">اختر </label>
                    <select class="form-control js-example-basic-single generalSelect" id="generalSelect"
                        name="generalSelect">
                    </select>
                </div> --}}
                {{-- end of the old code --}}


                {{-- <div class="form-group col-md-6">
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
                    <select class="form-control js-example-basic-single" id="department-choice" name="department">


                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="role-choice">الدور الوظيفي</label>
                    <select class="form-control js-example-basic-single" id="role-choice" name="role">
                        @foreach ($roles as $role)
                        <option value="{{$role->Role_name}}">{{$role->Role_name}} </option>
                        @endforeach
                    </select>
                </div>
                --}}

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
<script>

    function checkTwoValues() {

$('#data-container').empty();
$('#data-container').append('<br> <p><label>قيمة المفتاح: </label>'+data[0]['key_value'] + '<br><label>نوع الحساب:</label> ' + data[0]['calc_type_id'] + ' </p>');
if (data[0]['calc_type_id'] == 1) {
//doctor calculation
$('#data-container').append('<input type="text" name="newInput" id="newInput" placeholder="عدد ساعات العمل شهريا">'+'/'+data[0]['key_value']);
var keyValue = data[0]['key_value'];
$('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
$('#newInput').on('change', function() {

var inputValue = $(this).val();
var result = inputValue / keyValue;
$('#resultInput').val(result);
});
}else if(data[0]['calc_type_id'] == 2)
{ //nurse calcularion
$('#data-container').append('<input type="text" name="newInput" id="newInput" placeholder="عددالأسرة">'+'*'+data[0]['key_value']);
var keyValue = data[0]['key_value'];
$('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
$('#newInput').on('change', function() {
var inputValue = $(this).val();
var result = inputValue * keyValue;
$('#resultInput').val(result);
});
}else if(data[0]['calc_type_id'] == 3)
{
$('#data-container').append('<input type="number" style="width: 35%" name="number_of_sessions" placeholder="عدد الجلسات شهريا">'+ '*'+'<input type="number" id="session_duration" style="width: 35%" name="session_duration" placeholder="مدة الجلسة"><br>'+'/'+
'<input type="number" id="working_minutes_per_day" style="width: 35%" name="working_minutes_per_day" placeholder="دقائق العمل يوميا">'+ '*'+ '<input type="number" id="working_days" style="width: 35%" name="working_days" placeholder="أيام العمل">');
$('#session_duration').val(40);
$('#working_minutes_per_day').val(318);
$('#working_days').val(22);
var keyValue = data[0]['key_value'];

$('#number_of_sessions').on('change', function() {

var number_of_sessions = $(this).val();
var session_duration = $('#session_duration').val();
var number_of_sessions = $('#number_of_sessions').val();
var working_days = $('#working_days').val();
var result = (number_of_sessions * session_duration) / (number_of_sessions*working_days);
$('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
$('#resultInput').val(result);
});
}else if(data[0]['calc_type_id'] == 4)
{
$('#data-container').append('<input type="number" style="width: 35%" name="number_of_examinations" placeholder="متوسط عدد الفحوصات شهريا">'+ '*'+'<input type="number" id="examination_time" style="width: 35%" name="examination_time" placeholder="مدة الفحص"><br>'+'/'+ '<input type="number" id="working_minutes_per_day" style="width: 35%" name="working_minutes_per_day" placeholder="دقائق العمل يوميا">'+ '*'+ '<input type="number" id="working_days" style="width: 35%" name="working_days" placeholder="أيام العمل">');
$('#examination_time').val(20);
$('#working_minutes_per_day').val(420);
$('#working_days').val(22);
var keyValue = data[0]['key_value'];

$('#number_of_examinations').on('change', function() {

var number_of_examinations = $(this).val();
var examination_time = $('#examination_time').val();
var number_of_examinations = $('#number_of_examinations').val();
var working_days = $('#working_days').val();
var result = (number_of_examinations * examination_time) / (number_of_examinations*working_days);
$('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
$('#resultInput').val(result);
});
}
$('#jstree')
.jstree(true)
.select_node( data[0]['department_id']);
}

</script>
{{-- show new dropdown due to previous dropdown --}}
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
});



// $('#managmentCode').change ( function () {

//     var managmentCode = $(this).val();
//     console.log(managmentCode);
//     if (managmentCode) {
//     $.ajax({
//             url: "{{route('checkvalue')}}",
//             type: "get",
//             dataType : "json",
//             data: {
//             "managmentCode": managmentCode
//     },
//             success: function(data) {
//             if(data.status==true){
//             if(data.newData!=null){
//                 $('.generalChoice').removeClass('d-none');

//                 $.each(data.newData, function(key, value) {

//                 $('select[name="generalSelect"]').append('<option value="' + value.tb_managment_code + '">' + value.tb_managment_name +
//                     '</option>');
//                     });
//                 }}}



// });
//     }
// });


$('#roleChoice').change(function () {

var roleChoice = $(this).val();
// console.log(roleChoice);
if (roleChoice ) {
$("#jstree").jstree().deselect_all(true);
$.ajax({
url: "{{route('checkvalue')}}",
type: "get",
dataType : "json",
data: {
"roleChoice": roleChoice
},
success: function(data) {
console.log(data);
if(data){
    checkTwoValues();
//     $('#data-container').empty();
//     $('#data-container').append('<br><p><label>قيمة المفتاح: </label>'+data[0]['key_value'] + '<br><label>نوع الحساب:</label> ' + data[0]['calc_type_id'] + '</p>');
//     if (data[0]['calc_type_id'] == 1) {
//     //doctor calculation
//     $('#data-container').append('<input type="text" name="newInput" id="newInput" placeholder="عدد ساعات العمل شهريا">'+'/'+data[0]['key_value']);
//     var keyValue = data[0]['key_value'];
// $('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
// $('#newInput').on('change', function() {

//     var inputValue = $(this).val();
//     var result = inputValue / keyValue;
//     $('#resultInput').val(result);
//         });
// }else if(data[0]['calc_type_id'] == 2)
// {   //nurse calcularion
//     $('#data-container').append('<input type="text" name="newInput" id="newInput" placeholder="عددالأسرة">'+'*'+data[0]['key_value']);
//     var keyValue = data[0]['key_value'];
//     $('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
//     $('#newInput').on('change', function() {
//     var inputValue = $(this).val();
//     var result = inputValue * keyValue;
//     $('#resultInput').val(result);
//         });
// }else if(data[0]['calc_type_id'] == 3)
//  {
//     $('#data-container').append('<input type="number"  style="width: 35%" name="number_of_sessions" placeholder="عدد الجلسات شهريا">'+
//     '*'+'<input type="number" id="session_duration" style="width: 35%" name="session_duration" placeholder="مدة الجلسة"><br>'+'/'+
//     '<input type="number" id="working_minutes_per_day" style="width: 35%" name="working_minutes_per_day" placeholder="دقائق العمل يوميا">'+ '*'+
//     '<input type="number" id="working_days" style="width: 35%" name="working_days" placeholder="أيام العمل">');
//     $('#session_duration').val(40);
//     $('#working_minutes_per_day').val(318);
//     $('#working_days').val(22);
//     var keyValue = data[0]['key_value'];

// $('#number_of_sessions').on('change', function() {

//     var number_of_sessions = $(this).val();
//     var session_duration = $('#session_duration').val();
//     var number_of_sessions = $('#number_of_sessions').val();
//     var working_days = $('#working_days').val();
//     var result = (number_of_sessions * session_duration) / (number_of_sessions*working_days);
//     $('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
//     $('#resultInput').val(result);
//         });
// }else if(data[0]['calc_type_id'] == 4)
// {
//     $('#data-container').append('<input type="number" style="width: 35%" name="number_of_examinations" placeholder="متوسط عدد الفحوصات شهريا">'+
//     '*'+'<input type="number" id="examination_time" style="width: 35%" name="examination_time" placeholder="مدة الفحص"><br>'+'/'+
//     '<input type="number" id="working_minutes_per_day" style="width: 35%" name="working_minutes_per_day" placeholder="دقائق العمل يوميا">'+ '*'+
//     '<input type="number" id="working_days" style="width: 35%" name="working_days" placeholder="أيام العمل">');
//     $('#examination_time').val(20);
//     $('#working_minutes_per_day').val(420);
//     $('#working_days').val(22);
//     var keyValue = data[0]['key_value'];

//     $('#number_of_examinations').on('change', function() {

//     var number_of_examinations = $(this).val();
//     var examination_time = $('#examination_time').val();
//     var number_of_examinations = $('#number_of_examinations').val();
//     var working_days = $('#working_days').val();
//     var result = (number_of_examinations * examination_time) / (number_of_examinations*working_days);
//     $('#data-container').append('<br> <br>'+'النتيجة: '+'<input type="text" name="resultInput" id="resultInput">');
//     $('#resultInput').val(result);
//     });
// }

// $('#jstree')
// .jstree(true)
// .select_node( data[0]['department_id']);
 }

// $('#jsTree').jstree('select_node', 'id' + department_id);
}
        });
}
// $('#jstree').on('changed.jstree', function(e, data) {
//     var selectedIds = data.selected;
//     console.log(selectedIds);
//     if (selectedIds) {
//     $.ajax({
//     url: "{{route('checkvalue')}}",
//     type: "get",
//     dataType : "json",
//     data: {
//     "selectedIds": selectedIds
//     },

//     })
//     }});
        });



</script>
<script>
    //     $('#jstree').on('changed.jstree', function(e, data) {
//     var selectedIds = data.selected;
//     console.log(selectedIds);
//     if (selectedIds) {
//         $.ajax({
//         url: "{{route('checkvalue')}}",
//         type: "get",
//         dataType : "json",
//         data: {
//         "selectedIds": selectedIds
//         },

//         })
// }});
</script>
{{-- <script>
    $('#roleChoice').change(function () {
    var roleChoice = $(this).val();
    if (roleChoice) {
    $("#jstree").jstree().deselect_all(true);
    $.ajax({
    url: "{{route('checkvalue')}}",
    type: "get",
    dataType : "json",
    data: {
    "roleChoice": roleChoice
    },
    success: function(data) {
    // process the returned data
    }
    });
    }

    $('#jstree').on('changed.jstree', function(e, data) {
    var selectedIds = data.selected;
    console.log(selectedIds);
    if (selectedIds) {
    $.ajax({
    url: "{{route('checkvalue')}}",
    type: "get",
    dataType : "json",
    data: {
    "selectedIds": selectedIds
    },
    success: function(data) {
    // process the returned data
    }
    });
    }
    });
    });
</script> --}}
{{-- <script>
    $('#hours').on('change', function() {
    var hours = $(this).val();
    var result = hours / 140;

    $('#result').on('click', function() {
    $('#doctor_result').text(result.toFixed(2));

    });
    $('#result').on('click', function() {
    var doctor_count = $('input[name="doctor_count"]').val();
    var doctor_need = doctor_count - result ;
    $('#doctor_need').text(doctor_need);  });
    });
</script> --}}

@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        //to make the size of select2 as the div to be col-md-4 whatever the screen size
        $("..js-example-basic-single").select2({
        width: 'resolve' // need to override the changed default
        });
    });
</script>
@endpush
