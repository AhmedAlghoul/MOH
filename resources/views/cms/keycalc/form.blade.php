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

    .form-group.row {
        margin-top: -10px;
        /* Adjust the value as needed */
    }

    .calculate-btn {
        margin-top: -30px;
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


@endsection

@section('scripts')

{{-- show new dropdown due to previous dropdown --}}
<script>
    // $(document).ready(function() {
     function SaveData(key_value,calc_type_id) {
        var jobtitle_id =$('#roleChoice').val();
        var department_id =$('.department_id').val();
        // var key_value = data[0]['key_value'];
        // var calc_type_id = data[0]['calc_type_id'];
        var emp_count = globalCount;
        var result = $('#resultInput').text();
        var need = $('#needInput').text();
    $.ajax({
        url: "{{route('results.store')}}",
        type: "post",
        dataType : "json",
        async:false,
        data: {
            "jobtitle_id" : jobtitle_id,
            "department_id" : department_id,
            "key_value" : key_value,
            "calc_type_id": calc_type_id,
            "emp_count":emp_count,
            "result": result,
            "need": need
    },
    success: function(data) {
    console.log("hello there" );
    }
    });
    }
//     window.SaveData = SaveData;
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
        // console.log(selectedIds);
    // .select_node(data.selected);
        $('.department_id').val(selectedIds);
        checkTwoValues();

});



$('#roleChoice').change(function () {
    checkTwoValues();
        });

    let globalCount; // define a global variable
        function getEmpCount() {
        var departmentid = $('.department_id').val();
        var roleChoice = $('#roleChoice').val();
        $('#data-container').html('');
        if (roleChoice && departmentid ) {
        $.ajax({
        url: "{{route('getCount')}}",
        type: "get",
        dataType : "json",
        async:false,
        data: {
        "roleChoice": roleChoice,
        "departmentid": departmentid
        },
        success: function(data) {
            let count = data;
            console.log(count );
            globalCount = count;
        }
        });
        }}

        function checkTwoValues() {
    var departmentid =$('.department_id').val();
    var roleChoice =$('#roleChoice').val();
// var roleChoice = $(this).val();
    console.log(roleChoice);
    console.log(departmentid);
    $('#data-container').html('');
    if (roleChoice && departmentid ) {
// $("#jstree").jstree().deselect_all(true);
    $.ajax({
        url: "{{route('checkvalue')}}",
        type: "get",
        dataType : "json",
        data: {
        "roleChoice": roleChoice,
        "departmentid": departmentid
    },
        success: function(data) {
        console.log(data);

        if(data.length>0){
        getEmpCount();

$('#data-container').append('<br> <p><label>قيمة المفتاح: </label>'+data[0]['key_value'] + '<br><label>نوع الحساب:</label> ' + data[0]['const_name'] + ' </p>');
if (data[0]['calc_type_id'] == 1) {
    //doctor and medical imaginig calculation
    $('#data-container').append('<input type="text" name="monthly_hours" id="newInput" placeholder="عدد ساعات العمل شهريا">'+'/'+data[0]['key_value']);
    var keyValue = data[0]['key_value'];
    let doctor = globalCount;
    $('#data-container').append('<p><label>العدد الموجود: </label>'+doctor);
    $('#data-container').append('العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br> <br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');
    $('#data-container').append('<br>'+'<a class="btn btn-primary save-btn" type="submit" onclick="SaveData(' + data[0]["key_value"] + ',' + data[0]["calc_type_id"] + ')"  >حفظ النتائج</a>');
    $('#newInput').on('change', function() {

    var inputValue = $(this).val();
    var result = inputValue / keyValue;
    var need = doctor-result;
    $('#resultInput').val(result.toFixed(1));
    $('#needInput').val(need.toFixed(1));
    });

    // $('.save-btn').click(function(event) {
    // event.preventDefault();
    // var jobtitle_id =$('#roleChoice').val();
    // var department_id =$('.department_id').val();
    // var key_value = data[0]['key_value'];
    // var calc_type_id = data[0]['calc_type_id'];
    // var doctor_count = globalCount;
    // var doctor_result = $('#resultInput').text();
    // var doctor_need = $('#needInput').text();

    // axios.post('/cms/admin/results/store', {
    // jobtitle_id : jobtitle_id,
    // department_id : department_id,
    // key_value : key_value,
    // calc_type_id: calc_type_id,
    // doctor_count:doctor_count,
    // doctor_result: doctor_result,
    // doctor_need: doctor_need
    // })


    // .then(function (response) {
    // console.log(response);
    // })
    // .catch(function (error) {

    // console.log(error);
    // });
    // });

}
else if(data[0]['calc_type_id'] == 2)
{ //nurse calcularion
    $('#data-container').append('<input type="text" name="newInput" id="newInput" placeholder="عددالأسرة">'+'*'+data[0]['key_value']);
    var keyValue = data[0]['key_value'];
    var nurse = globalCount;
    $('#data-container').append('<p><label>العدد الموجود: </label>'+nurse);
    $('#data-container').append('العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br> <br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');

    $('#newInput').on('change', function() {
    var inputValue = $(this).val();
    var result = inputValue * keyValue;
    var need = nurse-result;
    $('#resultInput').val(result.toFixed(1));
    $('#needInput').val(need.toFixed(1));
    });

}else if(data[0]['calc_type_id'] == 3)
 {// علاج طبيعي
    let Physiotherapy_technician = globalCount;
    $('#data-container').append('<label>العدد الموجود: </label>'+Physiotherapy_technician);
    $('#data-container').append(' <form class="form-horizontal">\
        <div class="card-body">\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> عدد الجلسات</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="number_of_sessions" name="number_of_sessions">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">مدة الجلسة الافتراضية</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="session_duration" name="session_duration" value="'+data[0]['key_value']+'" >\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> دقائق العمل يوميا</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="working_minutes_per_day" name="working_minutes_per_day" value="'+data[0]['value_col1']+'">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">أيام العمل</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="working_days" name="working_days" value="'+data[0]['value_col2']+'">\
                </div>\
            </div>\
        </div>\
    </form>');
    $('#data-container').append('<a class="btn btn-primary calculate-btn" type="submit">حساب</a>');
    $('#data-container').append('<br>'+'العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br><br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');

    $('.calculate-btn').click(function() {
    let number_of_sessions = parseInt($('#number_of_sessions').val());
    let session_duration = parseInt($('#session_duration').val());
    let working_minutes_per_day = parseInt($('#working_minutes_per_day').val());
    let working_days = parseInt($('#working_days').val());
    let result = (number_of_sessions * session_duration) / (working_minutes_per_day * working_days);
    let need = Physiotherapy_technician - result ;
    $('#resultInput').val(result.toFixed(1));
    $('#needInput').val(need.toFixed(1));

    });


}else if(data[0]['calc_type_id'] == 4)
{//مختبرات
    let laboratory_technician = globalCount;
    $('#data-container').append('<label>العدد الموجود: </label>'+laboratory_technician);
    $('#data-container').append(' <form class="form-horizontal">\
        <div class="card-body">\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> متوسط عدد الفحوصات شهريا</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="number_of_examinations">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">مدة الفحص الافتراضية</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="examination_time" value="'+data[0]['key_value']+'" >\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputEmail3" class="col-sm-4 col-form-label"> دقائق العمل يوميا</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="working_minutes_per_day" value="'+data[0]['value_col1']+'">\
                </div>\
            </div>\
            <div class="form-group row">\
                <label for="inputPassword3" class="col-sm-4 col-form-label">أيام العمل</label>\
                <div class="col-sm-8">\
                    <input type="number" class="form-control" id="working_days" value="'+data[0]['value_col2']+'">\
                </div>\
            </div>\
        </div>\
    </form>');
    $('#data-container').append('<a class="btn btn-primary calculate-btn" type="submit">حساب</a>');
    $('#data-container').append('<br>'+'العدد المطلوب: '+'<input type="text" name="resultInput" id="resultInput">');
    $('#data-container').append('<br><br>'+'الفائض/الاحتياج: '+'<input type="text" name="needInput" id="needInput">');

    $('.calculate-btn').click(function() {
    let number_of_examinations = parseInt($('#number_of_examinations').val());
    let examination_time = parseInt($('#examination_time').val());
    let working_minutes_per_day = parseInt($('#working_minutes_per_day').val());
    let working_days = parseInt($('#working_days').val());
    let result = (number_of_examinations * examination_time) / (working_minutes_per_day * working_days);
    let need = laboratory_technician - result ;
    $('#resultInput').val(result.toFixed(1));
    $('#needInput').val(need.toFixed(1));
    });



}else if(data[0]['calc_type_id'] == 6)
{//صيدلة
    $('#data-container').append(' <form class="form-horizontal">\
    <div class="card-body">\
        <div class="form-group row">\
            <label for="number_of_prescriptions" class="col-sm-4 col-form-label"> عدد الروشتات</label>\
            <div class="col-sm-8">\
                <input type="number" class="form-control" id="number_of_prescriptions" name="number_of_prescriptions">\
            </div>\
        </div>\
        <div class="form-group row">\
            <label for="number_of_medical_reports" class="col-sm-4 col-form-label">عدد التقارير</label>\
            <div class="col-sm-8">\
                <input type="number" class="form-control" id="number_of_medical_reports" name="number_of_medical_reports">\
            </div>\
        </div>\
    </div>\
</form>');



}
// else if (){}

// $('#jstree')
// .jstree(true)
// .select_node( data[0]['department_id']);
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
