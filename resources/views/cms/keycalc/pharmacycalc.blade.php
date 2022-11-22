@extends('cms.parent')

@section('title','حساب مفتاح الصيدلة')

@section('styles')
<style>
    .card-title {
        float: right;
    }
</style>

@endsection


@section('page-name','حساب مفتاح الصيدلة')

@section('small-page-name','حساب مفتاح الصيدلة')



@section('content')

<div class="col-md-12">
    <div class="callout callout-warning">
        <h5>طريقة حساب مفتاح الصيدلة</h5>
        <p>كل 1000 روشتة تحتاج إلى دكتور صيدلي واحد ، كل 300 تقرير طبي تعادل 1000 روشتة ويكون الاحتياج صيدلي اضافي ايضا
        </p>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">حساب ناتج مفتاح الصيدلة</h3>

            <div class="card-tools" style="float: left">
                <ul class="pagination pagination-sm float-left">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            {{-- @if(isset($flag))
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>الكادر المطلوب</th>
                        <th>الاحتياج</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>{{$department}}</td>
                        <td>{{$need}}</td>
                        <td>{{$result}}</td>
                    </tr>
                </tbody>
            </table>
            @else
            <form method="post" action="{{route('nurseCalculate')}}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>القسم</th>
                            <th style="width: 40px">المفتاح</th>
                            <th>عدد الأسرة </th>
                            <th>عدد الممرضين الحالي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>{{$department}}</td>
                            <input name="department" hidden value="{{$department}}">
                            <td>{{$key->key_value}}</td>
                            <input name="key_value" hidden value="{{$key->key_value}}">
                            <td><input name="bed_count" type="number"></td>
                            <td>{{$nurse_count}}</td>
                            <input name="nurse_count" hidden value="{{$nurse_count}}">
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">حساب</button>
                </div>
            </form>
            @endif
            --}}




            {{-- //////////////////////////////////////////////////////// --}}
            @if (isset($flag))
            <form method="POST" action="{{route('pharmacy.store')}}">
                @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>العدد حسب المفتاح</th>
                        <th>فائض/عجز</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>{{$department}}</td>
                        <input name="hospital_name" hidden value="{{$hospital_name}}">
                        <input name="department" hidden value="{{$department}}">
                        <input name="number_of_prescriptions" hidden value="{{$number_of_prescriptions}}">
                        <input name="number_of_medical_reports" hidden value="{{$number_of_medical_reports}}">
                        <input name="pharmacist_count" hidden value="{{$pharmacist_count}}">

                        <td>{{$result}}</td>
                        <input name="result" hidden value="{{$result}}">
                        <td>{{$need}}</td>
                        <input name="need" hidden value="{{$need}}">
                    </tr>
                </tbody>
            </table>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ النتائج</button>
            </div>
            </form>
            @else
            <form method="post" action="{{route('pharmacyCalculate')}}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>القسم</th>
                            <th>عدد الروشتات</th>
                            <th>عدد التقارير الطبية</th>
                            <th>العدد الحالي</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>{{$department}}</td>
                            <input name="department" hidden value="{{$department}}">
                            <td><input type="number" name="number_of_prescriptions"></td>
                            <td><input type="number" name="number_of_medical_reports"></td>

                            <td>{{$pharmacist_count}}</td>
                            <input name="pharmacist_count" hidden value="{{$pharmacist_count}}">
                            <input name="hospital_name" hidden value="{{$hospital_name}}">
                        </tr>

                    </tbody>

                </table>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="calcbutton">حساب</button>
                </div>
                @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>


@endsection


@section('scripts')

<script>

</script>
@endsection
