@extends('cms.parent')

@section('title','حساب مفتاح المختبرات')

@section('styles')
<style>
    .card-title {
        float: right;
    }
</style>
@endsection


@section('page-name','حساب مفتاح المختبرات')

@section('small-page-name','حساب مفتاح المختبرات')



@section('content')

<div class="col-md-12">
    <div class="callout callout-warning">
        <h5>طريقة حساب مفتاح المختبرات</h5>
        <p> عن طريق معادلة (عدد الفحوصات شهريا *مدة الفحص )/(عدد دقائق العمل يوميا*ايام العمل)</p>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">حساب ناتج مفتاح المختبرات</h3>

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
                        <th>الاحتياج/الفائض</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>{{$department}}</td>
                        <td>{{$result}}</td>
                        <td>{{$need}}</td>

                    </tr>

                </tbody>

            </table>
            @else
            <form method="post" action="{{route('laboratorytechnicianscalc')}}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>القسم</th>
                            <th>العدد الحالي</th>
                            <th>عدد الفحوصات</th>
                            <th>مدة الفحص</th>
                            <th>دقائق العمل يوميا</th>
                            <th>أيام العمل</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>{{$department}}</td>
                            <input name="department" hidden value="{{$department}}">
                            <td>{{$laboratory_technicians_count}}</td>
                            <input name="laboratory_technicians_count" hidden value="{{$laboratory_technicians_count}}">
                            <td><input type="number" style="width: 75%" name="number_of_examinations"></td>

                            <td><input type="number" id="examination_time" style="width: 75%" name="examination_time">
                            </td>
                            <td><input type="number" id="working_minutes_per_day" style="width: 75%"
                                    name="working_minutes_per_day">
                            </td>
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
    document.getElementById("examination_time").defaultValue = "20";
document.getElementById("working_minutes_per_day").defaultValue = "420";
document.getElementById("working_days").defaultValue = "22";
</script>

@endsection