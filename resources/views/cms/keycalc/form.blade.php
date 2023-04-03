@extends('cms.parent')

@section('title','حساب مفتاح الكادر البشري')

@section('styles')
<style>
    .form-control {
        width: 33%;
    }

    .inp {
        width: 50%;
    }

    .card-title {
        float: right;
        font-size: 25px;
    }

    .form-group.row {
        margin-top: -10px;
        /* Adjust the value as needed */
    }

    .calculate-btn {
        margin-top: -30px;
    }

    #empshow {
        text-decoration: underline;
        text-align: center;
    }

    #empshow:hover {
        font-weight: bold;
    }

    #data-container .alert {
        background-color: #2196F3;
        color: #fff;
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
            {{-- <button style="float: left" type="button" class="btn btn-default">
                طريقة حساب المفتاح </button> --}}
            <a class="btn btn-light" style="float: left;background-color: #2196F3;font-weight: bold; "
                data-toggle="modal" data-target="#calcModal">
                طريقة حساب المفتاح
            </a>

            <h3 class="card-title">حساب المفتاح</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form id="create-form" role="form" method="GET" action="{{route('keycalc.getEmployeeRole')}}">
            {{-- csrf must be in the form tag --}}
            @csrf
            <div id="alert_success" class="d-none">
                <div class="alert alert-success" role="alert">
                    تم حفظ النتيجة بنجاح!
                </div>
            </div>

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

                {{-- {{ dd('Success message found!') }} --}}



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

                <div class="col-md-4 ">
                    <label for="imported_data">المسمى الوظيفي/الفئة الوظيفية</label>
                    <br>
                    <select class="form-control js-example-basic-single imported_data" id="imported_data" name="Data">

                    </select>
                    <div id="info-container"></div>

                    {{-- start of administrative calculaction form --}}
                    <div id="administrativecalc" style="display: none;">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="twenty_four_hours" class="col-sm-4 col-form-label"> عدد النقاط بنظام
                                        24 ساعة</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control inp" id="twenty_four_hours"
                                            name="twenty_four_hours">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="seven_hours" class="col-sm-4 col-form-label">عدد النقاط بنظام 7
                                        ساعات</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control inp" id="seven_hours" name="seven_hours">
                                    </div>
                                </div>
                                <a class="btn btn-primary calculate-btn" type="submit">حساب</a>
                            </div>
                        </form>
                    </div>
                    {{-- End of administrative calculaction form --}}

                    {{-- start of administrative calculaction busyness rate form --}}
                    <div id="administrative_calc_busyness_rate" style="display: none;">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="busyness_rate" class="col-sm-4 col-form-label"> نسبة انشغال
                                        الاسرة</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control inp" id="busyness_rate"
                                            name="busyness_rate">
                                    </div>
                                </div>
                                <a class="btn btn-primary calculate-btn" type="submit">حساب</a>
                            </div>
                        </form>
                    </div>
                    {{-- End of administrative calculaction form --}}
                    <div id="data-container"></div>
                    <div id="data-input"></div>

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
            {{--
            <div class="card-footer"> --}}
                {{-- //when press on submit button it should go to page due to the action in the form tag --}}
                {{-- <button type="submit" class="btn btn-primary" id="save">حفظ النتائج</button> --}}
                {{-- </div> --}}

        </form>
    </div>
    <!-- /.card -->
</div>
<!-- /.card -->

@include('cms.modal.calculateMethodModal')
@include('cms.modal.employeesNamesModal')
@endsection

@section('scripts')

{{-- show new dropdown due to previous dropdown --}}
<script>
    $(document).ready(function(){
    $('.btn-info').click(function(){
    $('#calcModal').modal('show');
    });

    // $('.btn-info').click(function(){
    // $('#ffffModal').modal('show');
    // });

    });

    let choice_id_global;
    $(document).ready(function(){
        //to change the next select to be jobtitles or classifications
        $('#calculation_method').change(function () {
        let choice_id = $(this).val();
        choice_id_global=choice_id;
        $('#data-container').html('');
        $('#info-container').html('');
        $('#calcdetails').text('');
        // console.log(choice_id);
        $.ajax({
        url: "{{route('getData')}}",
        type: "get",
        data: {
        choice_id: choice_id
        },
        success: function(data) {
        var DataSelect = $('.imported_data');
        // Clear any existing options in the select element
        DataSelect.empty();
        // Iterate over the returned data and create an option element for each item

        if (data.classifications){
        $.each(data.classifications, function(index, item) {
        // DataSelect.attr('name', 'classification');
        // DataSelect.attr('id', 'classificationChoice');
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
            // DataSelect.attr('name', 'role');
            // DataSelect.attr('id', 'roleChoice');
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
    });

    // $(document).ready(function() {
     function SaveData(key_value,calc_type_id) {
        var imported_data =$('#imported_data').val();
        var department_id =$('.department_id').val();
        // var key_value = data[0]['key_value'];
        // var calc_type_id = data[0]['calc_type_id'];
        var emp_count = globalCount;
        var details = globaldetails;
        var result = $('#resultInput').val();
        var need = $('#needInput').val();
    $.ajax({
        url: "{{route('results.store')}}",
        type: "post",
        dataType : "json",
        data: {
            "imported_data" : imported_data,
            "department_id" : department_id,
            "key_value" : key_value,
            "calc_type_id": calc_type_id,
            "emp_count":emp_count,
            "result": result,
            "need": need,
            "details": details,
            "choice_id_global": choice_id_global
            },
    success: function(data) {
            $('#alert_success').removeClass('d-none');
            setTimeout(function() {
            $('#alert_success').addClass('d-none');
            }, 2500); // hide the alert after 5 seconds (5000 milliseconds)

             }
    });
    }
//     window.SaveData = SaveData;
// });

    $(document).ready(function(){
    let url ="{{route('treeview')}}";
    // console.log(url);
    $('#jstree').jstree({
    "core" : {
    'data' : {
    'url' : url,
    'data' : function (node) {
        // console.log(node);
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
        $('.department_id').val(selectedIds);
        checkTwoValues();

});



    $('#imported_data').change(function () {
        checkTwoValues();
            });

    // $('#classificationChoice').change(function () {
    //         checkTwoValues();
    //         });


    let globalCount; // define a global variable
        function getEmpCount() {
        var departmentid = $('.department_id').val();
        var imported_data = $('#imported_data').val();
        // var classificationChoice =$('#classificationChoice').val();
        $('#data-container').html('');
        // if (roleChoice && departmentid || classificationChoice && departmentid) {
        if (imported_data && departmentid ) {
        $.ajax({
        url: "{{route('getCount')}}",
        type: "get",
        dataType : "json",
        async:false,
        data: {
        "imported_data": imported_data,
        "departmentid": departmentid,
        "choice_id_global" :choice_id_global
        // "classificationChoice":classificationChoice
        },
        success: function(data) {
            // console.log(data.count);
            // console.log(data);
            let count = data.count;
            globalCount = count;
        if (count>0){
            $('#employees_data').empty();
            $.each(data.employees, function(index, item) {
            $('#employees_data').append(
            '<tr><td>' + item.TB_EMPBASICINFO_NO + '</td><td>' + item.ANAME + '</td></tr>');
            });
        }
        }
        });
        }}

    let globaldetails;
        function checkTwoValues() {
    var departmentid =$('.department_id').val();
    var imported_data =$('#imported_data').val();

    // var classificationChoice =$('#classificationChoice').val();
    // var roleChoice = $(this).val();
    // console.log(imported_data);
    // console.log(departmentid);
    // console.log(classificationChoice);
    $('#data-container').html('');
    $('#info-container').html('');
    $('#administrativecalc').hide();
    $('#administrative_calc_busyness_rate').hide();
    $('#calcdetails').text('');
    // if (roleChoice && departmentid || classificationChoice && departmentid ) {
    if (imported_data && departmentid ) {
// $("#jstree").jstree().deselect_all(true);
    $.ajax({
        url: "{{route('checkvalue')}}",
        type: "get",
        dataType : "json",
        data: {
        "imported_data": imported_data,
        "departmentid": departmentid,
        "choice_id_global" : choice_id_global
        // "classificationChoice": classificationChoice
    },
        success: function(data) {
    if (data.length === 0) {
$('#data-container').html('<div class="alert" role="alert" style="font-weight: bold;margin-top:10px;"> عذراً ، لا يوجد مفتاح مضاف</div>');
    return;
    }
        // console.log(data);
            if(data[0]['calc_method'] != null){
            $('#calcdetails').text('');
            // $('#calcdetails').text(data[0]['calc_method']);
            $('#calcdetails').text($('<div />').html(data[0]['calc_method']).text());
            }
        if(data.length>0){

        getEmpCount();


$('#info-container').append('<br> <p><label>قيمة المفتاح: </label>'+data[0]['key_value'] +' <label id="changeable"></label> <br><label>نوع الحساب:</label> ' + data[0]['const_name'] + ' </p>');
$('#warning-message').hide();
if (data[0]['calc_type_id'] == 1) {

    $('#changeable').text('ساعة');
  //doctor and medical imaginig calculation
    $('#data-container').append('<input type="text" name="monthly_hours" id="newInput" placeholder="عدد ساعات العمل شهريا">'+'/'+data[0]['key_value']);
    var keyValue = data[0]['key_value'];
    let doctor = globalCount;
    let dtl = '';
    $('#data-container').append('<br> <br>'+'<p><label id="empcount" style="margin-left:30px">العدد الموجود: </label>'+doctor );
        if(doctor > 0){
//    $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -50px;" data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
$('#data-container').append('<a  id="empshow" style="float: left; margin-top: -50px;margin-left: 130px;"data-toggle="modal" data-target="#employeesModal"> موظف</a>');
}
    $('#data-container').append('العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br> <br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
    $('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit" onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>');
    $('#newInput').on('change', function() {

    var inputValue = $(this).val();
    var result = inputValue / keyValue;
    var need = doctor-result;
    let dtl = '('+inputValue+'/'+ keyValue+')';
    globaldetails=dtl;


    $('#resultInput').val(result.toFixed(0));
    $('#needInput').val(need.toFixed(0));
    });

}
else if(data[0]['calc_type_id'] == 2)
{ //nurse calcularion
    $('#data-container').append('<input type="text" name="newInput" id="newInput" placeholder="عددالأسرة">'+'*'+data[0]['key_value']);
    var keyValue = data[0]['key_value'];
    var nurse = globalCount;
    $('#data-container').append('<br> <br>'+'<p><label  style="margin-left:30px">العدد الموجود: </label>'+nurse);
        if(nurse > 0){
        // $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -50px;"data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
    $('#data-container').append('<a id="empshow" style="float: left; margin-top: -50px;margin-left: 130px;"data-toggle="modal" data-target="#employeesModal"> موظف</a>');
    }
    $('#data-container').append('العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br> <br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
$('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit" onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>' );
    $('#newInput').on('change', function() {
    var inputValue = $(this).val();
    var result = inputValue * keyValue;
    var need = nurse-result;
    let dtl = '('+inputValue+'*'+ keyValue+')';
    globaldetails=dtl;
    $('#resultInput').val(result.toFixed(0));
    $('#needInput').val(need.toFixed(0));
    });

}else if(data[0]['calc_type_id'] == 3)
 {// علاج طبيعي
    $('#changeable').text('دقيقة');
    let Physiotherapy_technician = globalCount;
    // $('#data-container').append('<label>العدد الموجود: </label>'+Physiotherapy_technician);
    // if(Physiotherapy_technician > 0){
    // $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -5px;"data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
    // }
    $('#data-container').append(' <form class="form-horizontal">\
        <div class="card-body">\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> عدد الجلسات</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="number_of_sessions" name="number_of_sessions">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">مدة الجلسة الافتراضية</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="session_duration" name="session_duration" value="'+data[0]['key_value']+'" >\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> دقائق العمل يوميا</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="working_minutes_per_day" name="working_minutes_per_day" value="'+data[0]['value_col1']+'">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">أيام العمل</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="working_days" name="working_days" value="'+data[0]['value_col2']+'">\
                </div>\
            </div>\
        </div>\
    </form>');
    $('#data-container').append('<a class="btn btn-primary calculate-btn" type="submit">حساب</a>');

    $('#data-container').append('<br> <br>'+'<label style="margin-left:30px">العدد الموجود: </label>'+Physiotherapy_technician);
    if(Physiotherapy_technician > 0){
    // $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -5px;"data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
        $('#data-container').append('<a id="empshow" style="float: left; margin-top: -3px;margin-left: 130px;"data-toggle="modal" data-target="#employeesModal"> موظف</a>');
}
    $('#data-container').append('<br><br>'+'العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br><br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
$('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit" onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>' );
    $('.calculate-btn').click(function() {
    let number_of_sessions = parseInt($('#number_of_sessions').val());
    let session_duration = parseInt($('#session_duration').val());
    let working_minutes_per_day = parseInt($('#working_minutes_per_day').val());
    let working_days = parseInt($('#working_days').val());
    let result = (number_of_sessions * session_duration) / (working_minutes_per_day * working_days);
    let need = Physiotherapy_technician - result ;
let dtl = '(' + number_of_sessions + '*' + session_duration + '/' + working_minutes_per_day + '*' + working_days + ')';
    globaldetails=dtl;
    $('#resultInput').val(result.toFixed(0));
    $('#needInput').val(need.toFixed(0));

    });


}else if(data[0]['calc_type_id'] == 4)
{//مختبرات
    $('#changeable').text('دقيقة');
    let laboratory_technician = globalCount;

    $('#data-container').append(' <form class="form-horizontal">\
        <div class="card-body">\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> متوسط عدد الفحوصات شهريا</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="number_of_examinations">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">مدة الفحص الافتراضية</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="examination_time" value="'+data[0]['key_value']+'" >\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> دقائق العمل يوميا</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="working_minutes_per_day" value="'+data[0]['value_col1']+'">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">أيام العمل</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control inp" id="working_days" value="'+data[0]['value_col2']+'">\
                </div>\
            </div>\
        </div>\
    </form>');
    $('#data-container').append('<a class="btn btn-primary calculate-btn" type="submit">حساب</a>');

    $('#data-container').append('<br> <br>'+'<label style="margin-left:27px">العدد الموجود: </label>'+laboratory_technician);

    if(laboratory_technician > 0){
    // $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -5px;"data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
        $('#data-container').append('<a id="empshow" style="float: left; margin-top: -3px;margin-left: 130px;"data-toggle="modal" data-target="#employeesModal"> موظف</a>');
}
    $('#data-container').append('<br><br>'+'العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br><br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
$('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit" onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>' );
    $('.calculate-btn').click(function() {
    let number_of_examinations = parseInt($('#number_of_examinations').val());
    let examination_time = parseInt($('#examination_time').val());
    let working_minutes_per_day = parseInt($('#working_minutes_per_day').val());
    let working_days = parseInt($('#working_days').val());
    let result = (number_of_examinations * examination_time) / (working_minutes_per_day * working_days);
    let need = laboratory_technician - result ;
    let dtl = '(' + number_of_examinations + '*' + examination_time + '/' + working_minutes_per_day + '*' + working_days + ')';
    globaldetails=dtl;
    $('#resultInput').val(result.toFixed(0));
    $('#needInput').val(need.toFixed(0));
    });



}else if(data[0]['calc_type_id'] == 6)
{//صيدلة
    $('#changeable').text('روشتة');
    $('#data-container').append(' <form class="form-horizontal">\
    <div class="card-body">\
        <div class="form-group row">\
            <label for="number_of_prescriptions" class="col-sm-4 col-form-label"> عدد الروشتات</label>\
            <div class="col-sm-8">\
                <input type="number" class="form-control inp" id="number_of_prescriptions" name="number_of_prescriptions">\
            </div>\
        </div>\
        <div class="form-group row">\
            <label for="number_of_medical_reports" class="col-sm-4 col-form-label">عدد التقارير</label>\
            <div class="col-sm-8">\
                <input type="number" class="form-control inp" id="number_of_medical_reports" name="number_of_medical_reports">\
            </div>\
        </div>\
    </div>\
</form>');
var pharmacist = globalCount;
var prescriptions_per_pharmacist = data[0]['key_value'];
var reports_per_pharmacist = data[0]['value_col1'];
$('#data-container').append('<a class="btn btn-primary calculate-btn" type="submit">حساب</a>');
$('#data-container').append('<br> <br>'+'<p><label style="margin-left:27px">العدد الموجود: </label>'+pharmacist);

    if(pharmacist > 0){
    // $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -50px;"data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
$('#data-container').append('<a id="empshow" style="float: left; margin-top: -50px;margin-left: 130px;"data-toggle="modal" data-target="#employeesModal"> موظف</a>');
        }

$('#data-container').append('العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
$('#data-container').append('<br><br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
$('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit" onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>' );

$('.calculate-btn').click(function() {
    let number_of_prescriptions = parseInt($('#number_of_prescriptions').val()) || 0;
    let number_of_medical_reports = parseInt($('#number_of_medical_reports').val()) || 0;
    let total_prescriptions =(number_of_medical_reports / reports_per_pharmacist) * prescriptions_per_pharmacist + number_of_prescriptions;
    let result =Math.ceil(total_prescriptions / prescriptions_per_pharmacist);
    let need = pharmacist - result ;
    let dtl = '('+total_prescriptions+'/'+ prescriptions_per_pharmacist+')';
    globaldetails=dtl;
    $('#resultInput').val(result.toFixed(0));
    $('#needInput').val(need.toFixed(0));
});


}else if(data[0]['calc_type_id'] == 7){
//نظام العمل- الاداريين
// `$('#administrativecalc').css('display', 'block');`
$('#changeable').text('موظفين');
$('#administrativecalc').show();

var administartive_count = globalCount;
var admin_count_24_hours = data[0]['key_value'];
var admin_count_7_hours = data[0]['value_col1'];

    // $('#data-container').append('<a class="btn btn-primary calculate-btn" type="submit">حساب</a>');
    $('#data-container').append('<p><label style="margin-left:27px;">العدد الموجود: </label>'+administartive_count);

        if(administartive_count > 0){
        // $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -52px;"data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
    $('#data-container').append('<a id="empshow" style="float: left; margin-top: -50px;margin-left: 130px;"data-toggle="modal" data-target="#employeesModal"> موظف</a>');
    }
    $('#data-container').append('العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br><br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
    $('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit"onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>' );
        $('.calculate-btn').click(function()
         {
            let count_of_24_hours_points = parseInt($('#twenty_four_hours').val()) || 0;
            let count_of_7_hours_points = parseInt($('#seven_hours').val()) || 0;
            let result =(count_of_24_hours_points *admin_count_24_hours) +(count_of_7_hours_points *admin_count_7_hours);
            let need=administartive_count - result ;
            let dtl = '(' + count_of_24_hours_points + '*' + admin_count_24_hours + '+' + count_of_7_hours_points + '*' + admin_count_7_hours + ')';
            globaldetails=dtl;
            $('#resultInput').val(result.toFixed(0));
           $('#needInput').val(need.toFixed(0))});

}else if(data[0]['calc_type_id'] == 8){
//انشغال الاسرة- الاداريين
    $('#changeable').text('% من الاسرة');
    $('#administrative_calc_busyness_rate').show();

    var administartive_count = globalCount;
    $('#data-container').append('<p><label style="margin-left:27px;">العدد الموجود: </label>'+administartive_count);
        if(administartive_count > 0){
        // $('#data-container').append('<a class="btn btn-info" id="empshow" style="float: left; margin-top: -52px;" data-toggle="modal" data-target="#employeesModal"> عرض الموظفين</a>');
          $('#data-container').append('<a id="empshow" style="float: left; margin-top: -50px;margin-left: 130px;"data-toggle="modal" data-target="#employeesModal"> موظف</a>');
          }
    $('#data-container').append('العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br><br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
    $('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit" onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>' );
    $('.calculate-btn').click(function() {

        let busyness_rate =parseInt($('#busyness_rate').val()) ||0;
        if(busyness_rate >= 75 && busyness_rate <= 100 ){
            $('#warning-message').remove();
            let result=1;
        }else if (busyness_rate >= 0 && busyness_rate < 75){
            $('#warning-message').remove();
            let result=1;
            $('#data-container').append('<p id="warning-message" style="font-weight: bold; color: red;">يتم في هذه الحالة دمج قسمين سويا ليتم عمل مراسل واحد</p>');
        }
        let result=1;
        let need=administartive_count - result ;

        $('#resultInput').val(result.toFixed(0));
        $('#needInput').val(need.toFixed(0))});
}

}
}
});
}
}

</script>

@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js">
</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        //to make the size of select2 as the div to be col-md-4 whatever the screen size
        $(".js-example-basic-single").select2({
        width: '100%' // need to override the changed default
        });
    });
</script>
@endpush
