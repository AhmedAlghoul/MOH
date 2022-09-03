@extends('cms.parent')

@section('title','')

@section('styles')
<style>
    .doccalc {
        margin-right: 25px;
        margin-top: 5px;
        padding-bottom: 10px;
    }
</style>
@endsection


@section('page-name','حساب مفتاح الأطباء')

@section('small-page-name','حساب مفتاح الأطباء')



@section('content')
<div class='doccalc'>

    <h1> اسم المستشفى </h1>
    <h2> التخصص </h2>
    <h3>الدور الوظيفي</h3>

    <h5 for="hoursmonthly" style="display: inline-block">عدد ساعات العمل شهرياً <input id="hours" name="hours" type="number"> <label
            style="in">/140</label></h5>

    <br>

    @php
        
    @endphp



    <a href="#">النتيجة </a>
    <br> <br>
    <label for="doctorresult">الكادر المطلوب حسب المفتاح: <p> {{ 140 / 140 }}</p> </label>
    <br> <br>
    <label>عدد الأطباء في القسم: </label>
    <br> <br>
    <label>الاحتياج: </label>
    <br> <br>
    <a href="{{route('doctorsecond')}}">اضافة تفاصيل ساعات العمل</a>

</div>


@endsection


@section('scripts')

@endsection