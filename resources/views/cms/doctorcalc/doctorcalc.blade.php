@extends('cms.parent')

@section('title','حساب مفتاح الأطباء')

@section('styles')
<style>
    .doccalc {
        margin-right: 25px;
        margin-top: 5px;
        padding-bottom: 10px;
    }

    h2 {
        text-align: center;
    }

    h3 {
        text-align: center;
    }

    #save {
        color: white;
        background: #242ea0;
        border-radius: 5px;
        font-size: 20px;

    }
</style>
@endsection


@section('page-name','حساب مفتاح الأطباء')

@section('small-page-name','حساب مفتاح الأطباء')



@section('content')
<div class="callout callout-warning">
    <h5>طريقة حساب مفتاح الأطباء</h5>
    <p>يتم حساب المفتاح بناء على عدد ساعات العمل الشهرية للقسم مقسومة على عدد ساعات عمل الأطباء شهريا وهي 140 ساعة </p>
    <div>المفتاح =(عدد ساعات العمل شهريا /140)</div>
</div>
<div class='doccalc'>

    {{-- <h2>{{$hospital}}</h2> --}}

    <form method="POST" action="{{route('doctors.store')}}">
        @csrf
        <h2>{{$hospital_name}}</h2>
        {{-- <input type="number" name="hospital_id" hidden value="{{$hospital_id}}"> --}}
        <input type="text" name="hospital_name" hidden value="{{$hospital_name}}">

        <h2> {{$department}} </h2>
        {{-- <input type="number" name="department_id" hidden value="{{$department_id}}"> --}}
        <input type="text" name="department" hidden value="{{$department}}">
        <h3>{{$employee_role}} </h3>
        <input type="text" name="employee_role" hidden value="{{$employee_role}}">
        <br>

        <h5 for="hoursmonthly" style="display: inline-block">عدد ساعات العمل شهرياً
            <input id="hours" name="monthly_hours" type="number"> <label style="in">/140</label>
        </h5>
        <br>
        <a id="result" href="#">النتيجة </a>
        <br> <br>
        <label>عدد الأطباء في القسم:
            {{$doctor_count}}
        </label>
        <input name="doctor_count" hidden value="{{$doctor_count}}">
        <br> <br>
        <label for="doctor_result">الكادر المطلوب حسب المفتاح: <p id="doctor_result" name="doctor_result"> </p> </label>
        <br> <br>
        <label>الاحتياج:<p id="doctor_need" name="doctor_need"></p></label>

        <br>

        <button type="submit" id="save"> حفظ النتائج</button>
        {{-- <br> <br>
        <a href="{{route('doctorsecond')}}">اضافة تفاصيل ساعات العمل</a> --}}
    </form>

</div>


@endsection


@section('scripts')
<script>
    $('#hours').on('change', function() {
        var hours = $(this).val();
        // var key = $('input[name="key_value"]').val();
        var result = hours / 140;
        //get the result when press on the button with id result

        $('#result').on('click', function() {
            //put the result in the input with id doctor_result in number format
            $('#doctor_result').text(result.toFixed(2));
            // $('#doctor_result').text(result);
        });
        //get the doctor need when press on the button with id result

        $('#result').on('click', function() {
            var doctor_count = $('input[name="doctor_count"]').val();
            var doctor_need = doctor_count - result ;
            $('#doctor_need').text(doctor_need);
        });

    });

    // send axios request to save the result in the database
    $('#save').on('click', function() {


        var monthly_hours = $('input[name="monthly_hours"]').val();
        var doctor_count = $('input[name="doctor_count"]').val();

        var doctor_result = $('#doctor_result').text();
console.log(doctor_result);
        var doctor_need = $('#doctor_need').text();
console.log(doctor_need);
        //send axios request to save the result in the database

        axios.post('/cms/admin/doctors', {

            monthly_hours: monthly_hours,
            doctor_count:doctor_count,
            doctor_result: this.doctor_result,
            doctor_need: this.doctor_need
        })


        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {

            console.log(error);
        });
    });

</script>
@endsection
