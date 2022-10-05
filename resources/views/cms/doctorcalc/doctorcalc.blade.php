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
</style>
@endsection


@section('page-name','حساب مفتاح الأطباء')

@section('small-page-name','حساب مفتاح الأطباء')



@section('content')
<div class='doccalc'>

    <h1 style="text-align: center">  </h1>
    {{-- <h2>{{$hospital}}</h2> --}}
    <h2> {{$department}} </h2>
    <h3>{{$employee_role}} </h3>
    <br>
    <form method="POST" action="">

        <h5 for="hoursmonthly" style="display: inline-block">عدد ساعات العمل شهرياً <input id="hours"
                name="monthly_hours" type="number"> <label style="in">/{{$key->key_value}} <input name="key_value"
                    hidden value="{{$key->key_value}}"></label></h5>
        <br>
        <a id="result" href="#">النتيجة </a>
        <br> <br>
        <label for="doctorresult">الكادر المطلوب حسب المفتاح: <p id="doctorresult"> </p> </label>
        <br> <br>
        <label>عدد الأطباء في القسم:
            {{$doctor_count}}
        </label>
        <input name="doctor_count" hidden value="{{$doctor_count}}">
        <br> <br>
        <label>الاحتياج<p id="doctor_need"></p></label>
        {{-- <br> <br>
        <a href="{{route('doctorsecond')}}">اضافة تفاصيل ساعات العمل</a> --}}
    </form>

</div>


@endsection


@section('scripts')
<script>
    $('#hours').on('change', function() {
        var hours = $(this).val();
        var key = $('input[name="key_value"]').val();
        var result = hours / key;
        //get the result when press on the button with id result

        $('#result').on('click', function() {
            $('#doctorresult').text(result);
        });
        //get the doctor need when press on the button with id result

        $('#result').on('click', function() {
            var doctor_count = $('input[name="doctor_count"]').val();
            var doctor_need = result - doctor_count;
            $('#doctor_need').text(doctor_need);
        });
        //save the result in the database
        // $('#result').on('click', function() {
        //     var doctor_need = $('#doctor_need').text();
        //     var doctor_count = $('input[name="doctor_count"]').val();
        //     var monthly_hours = $('input[name="monthly_hours"]').val();
        //     var key_value = $('input[name="key_value"]').val();
        //     var department = '{{$department}}';
        //     var employee_role = '{{$employee_role}}';
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{route('doctorcalc')}}",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             doctor_need: doctor_need,
        //             doctor_count: doctor_count,
        //             monthly_hours: monthly_hours,
        //             key_value: key_value,
        //             department: department,
        //             employee_role: employee_role
        //         },
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     });
        // });

        // $('#doctorresult').text(result);
    });

</script>
@endsection