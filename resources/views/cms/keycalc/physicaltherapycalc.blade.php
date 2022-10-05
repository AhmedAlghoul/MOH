@extends('cms.parent')

@section('title','حساب مفتاح العلاج الطبيعي')

@section('styles')
<style>
    .card-title {
        float: right;
    }
</style>

@endsection


@section('page-name','حساب مفتاح العلاج الطبيعي')

@section('small-page-name','حساب مفتاح العلاج الطبيعي')



@section('content')


<div class="col-md-12">
    <div class="callout callout-warning">
        <h5>طريقة حساب مفتاح العلاج الطبيعي</h5>
        <p> عن طريق معادلة (عدد الجلسات شهريا *مدة الجلسة )/(دقائق العمل يوميا*أيام العمل)</p>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">حساب ناتج مفتاح العلاج الطبيعي</h3>

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

            @if (isset($flag))
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>الكادر المطلوب</th>
                        <th>الفائض/الاحتياج</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>{{$department}}</td>
                        <th>{{$result}}</th>
                        <th>{{$need}}</th>

                    </tr>
                </tbody>
            </table>

            @else
            <form method="post" action="{{route('physicaltherapistcalc')}}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>القسم</th>
                            <th>عدد الأخصائيين الحاليين</th>
                            <th>عدد الجلسات </th>
                            <th>مدة الجلسة</th>
                            <th>دقائق العمل يوميا</th>
                            <th>أيام العمل</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>{{$department}}</td>
                            <input name="department" hidden value="{{$department}}">
                            <td>{{$physical_therapist_count}}</td>
                            <input name="physical_therapist_count" hidden value="{{$physical_therapist_count}}">
                            <td><input type="number" style="width: 75%" name="number_of_sessions"></td>

                            <td><input type="number" id="session_duration" style="width: 75%" name="session_duration">
                            </td>
                            <td><input type="number" id="working_minutes_per_day" style="width: 75%"
                                    name="working_minutes_per_day"></td>
                            <td><input type="number" id="working_days" style="width: 75%" name="working_days"></td>
                        </tr>

                    </tbody>

                </table>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">حساب</button>
                </div>
            </form>

            @endif




        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
@endsection


@section('scripts')
<script>
    document.getElementById("session_duration").defaultValue = "40";
    document.getElementById("working_minutes_per_day").defaultValue = "318";
    document.getElementById("working_days").defaultValue = "22";
</script>
@endsection