@extends('cms.parent')

@section('title','حساب مفتاح الإداريين')

@section('styles')
<style>
    .card-title {
        float: right;
    }
</style>

@endsection


@section('page-name','حساب مفتاح الإداريين')

@section('small-page-name','حساب مفتاح الإداريين')



@section('content')

<div class="col-md-12">
    <div class="callout callout-warning">
        <h5>طريقة حساب مفتاح الإداريين</h5>
        <p>يتم حساب المفتاح بناء على التخصص
            <br> المحاسبين :<br>
            • النقطة التي تعمل بنظام 24 ساعة يتم تغطيتها على الاقل 6 موظفين.
            • النقطة التي تعمل فترة واحد يتم تغطيتها بموظف واحد على الأقل.
            <br>المراسلين :<br>
            يتم احتساب المفتاح على حسب انشغال الاسرة في القسم اذا كان معدل الانشغال الاسرة في القسم ما يعادل 75% او اكثر
            من الاسرة
            يحتاج القسم الى مراسل اقل من ذلك يتم دمج قسمين سوياً.
            <br> الامن:<br>
            • البوابة التي تعمل بنظام 24 ساعة تحتاج الى 6 موظفين لتقديم الخدمة.
            • البوبة التي تعمل بنظام الفترة الواحدة يتم تغطيتها بموظف واحد فقط.
        </p>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">حساب ناتج مفتاح الإداريين
            </h3>

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
            @if(isset($flag))
<form method="POST" action="{{route('administratives.store')}}">
    @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>العدد الحالي</th>
                        <th>الكادر المطلوب</th>
                        <th>الاحتياج</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>{{$department}}</td>
                        <input type="text" name="department" value="{{$department}}" hidden>
                        <td>{{$administrative_count}}</td>
                        <input type="number" name="administrative_count" value="{{$administrative_count}}" hidden>
                        <td>{{$result}}</td>
                        <input type="number" name="result" value="{{$result}}" hidden>
                        <td>{{$need}}</td>
                        <input type="number" name="need" value="{{$need}}" hidden>
                        <input type="text" name="employee_role" value="{{$employee_role}}" hidden>
                        <input type="text" name="hospital_name" value="{{$hospital_name}}" hidden>
                        <input type="text" name="seven_hours" value="{{$seven_hours}}" hidden>
                        <input type="text" name="twenty_four_hours" value="{{$twenty_four_hours}}" hidden>
                    </tr>
                </tbody>
            </table>

            <div class="card-footer">
                    <button type="submit" class="btn btn-primary">حفظ النتائج</button>
                </div>
                </form>
            @else
            <form method="post" action="{{route('administrativecalculation')}}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>القسم</th>
                            <th>الدور الوظيفي</th>
                            <th>العدد الحالي</th>
                            <th>نظام العمل</th>
                            <th>عدد النقاط</th>



                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$department}}</td>
                            <input type="text" name="department" value="{{$department}}" hidden>
                            <td>{{$employee_role}}</td>
                            <input type="text" name="employee_role" value="{{$employee_role}}" hidden>
                            <td>{{$administrative_count}}</td>
                            <input type="text" name="administrative_count" value="{{$administrative_count}}" hidden>
                            <input type="text" name="hospital_name" value="{{$hospital_name}}" hidden>
                            <td><label for="12">7 ساعات</label>
                                <br>
                                <label for="24">24 ساعة</label>
                            </td>
                            <td><input type="number" style="width: 90px" name="seven_hours">
                                <br>
                                <input type="number" style="width: 90px" name="twenty_four_hours">
                            </td>
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

</script>

@endsection
