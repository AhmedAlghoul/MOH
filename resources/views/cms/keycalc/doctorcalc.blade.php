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


@section('page-name','Title')

@section('small-page-name','title')



@section('content')
<div class='doccalc'>

    <h1> اسم المستشفى </h1>
    <h2> التخصص </h2>
    <h3>الدور الوظيفي</h3>

    <h5 for="hoursmonthly" style="display: inline-block">عدد ساعات العمل شهرياً <input type="number"> <label
            style="in">/140</label></h5>

    <br>
    <button>النتيجة </button>
    <br> <br>
    <label for="doctorresult">الكادر المطلوب حسب المفتاح: </label>
    <br> <br>
    <label>عدد الأطباء في القسم: </label>
    <br> <br>
    <label>الاحتياج: </label>
    <br> <br>
    <button>اضافة تفاصيل ساعات العمل</button>

</div>


@endsection


@section('scripts')

@endsection