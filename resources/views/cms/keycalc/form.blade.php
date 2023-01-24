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
                <div class="col-md-6">
                    <label>المسمى الوظيفي</label>
                    <br>
                    <select class="form-control js-example-basic-single" id="departmentChoice" name="role">
                        @foreach ($roles as $role)
                        <option value="{{$role->jobtitle_code}}">{{$role->jobtitle_name_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="data-container"></div>
                {{-- start of the new code-JS tree --}}

                <div id="jstree">

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
// $('#jstree').on('changed.jstree' function(e,data){
//     var i , j ,r = [];
//     for (i=0, j=data.selected.length; i<j; i++ ){
//         r.push(data.instance.get_node(data.selected[i]).id);
//     }
//     // $('.parent_id').val(r.join(','));
// });

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


$('#departmentChoice').change(function () {

var departmentChoice = $(this).val();
console.log(departmentChoice);
if (departmentChoice) {
$.ajax({
url: "{{route('checkvalue')}}",
type: "get",
dataType : "json",
data: {
"departmentChoice": departmentChoice
},
success: function(data) {
console.log(data);
// $.each(data, function(index, value) {
// $('#data-container').append('<p>'+value.name + ': ' + value.age+'</p>');
// });
// for (let item of data) {
// console.log(item.key_value + ": " + item.calc_type_id);
// }
}

});
// }}}

// });
}
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
