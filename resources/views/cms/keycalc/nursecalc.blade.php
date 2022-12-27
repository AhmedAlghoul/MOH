@extends('cms.parent')

@section('title','حساب مفتاح التمريض')

@section('styles')
<style>
    .card-title {
        float: right;
    }
</style>

@endsection


{{-- @section('page-name','حساب مفتاح التمريض') --}}

@section('small-page-name','حساب مفتاح التمريض')



@section('content')

<div class="col-md-12">
    <div class="callout callout-warning">
        <h5>طريقة حساب مفتاح التمريض</h5>
        <p>يتم حساب المفتاح بناء على نسبة معينة لكل قسم مضروبة في عدد الأسرة </p>
    </div>
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">حساب ناتج مفتاح التمريض</h3>

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
            <form method="POST" action="{{route('nurses.store')}}">
                @csrf
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
                        <input type="number" name="need" hidden value="{{$need}}">
                        <td>{{$result}}</td>
                        <input type="number" name="result" hidden value="{{$result}}">
                        <input type="number" name="nurse_count" hidden value="{{$nurse_count}}">
                        <input type="number" name="key_value" hidden value="{{$key_value}}">
                        <input type="number" name="bed_count" hidden value="{{$bed_count}}">
                        <input type="number" name="department_id" hidden value="{{$department_id}}">
                        <input type="text" name="department" hidden value="{{$department}}">
                        <input type="text" name="hospital_name" hidden value="{{$hospital_name}}">
                    </tr>
                </tbody>
            </table>
            <div class="card-footer">
                    <button type="submit" class="btn btn-primary">حفظ النتائج</button>
                </div>
                </form>

            @else

            <form method="POST" action="{{route('nurseCalculate')}}">
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
                            {{-- data-url="api/storwe/dv,dv" --}}
                            <td>1.</td>
                            <td>{{$department}}</td>
                            <input name="department_id" hidden  value="{{$department_id}}">
                            <input type="text" name="department" hidden  value="{{$department}}">
                            <td>{{$key->key_value}}</td>
                            <input name="key_value" hidden value="{{$key->key_value}}">
                            <td><input name="bed_count" type="number"></td>
                            <td>{{$nurse_count}}</td>
                            <input name="nurse_count" hidden value="{{$nurse_count}}">
                            <input type="number" name="hospital_id" hidden value="{{$hospital_id}}">
                            <input type="text" name="hospital_name" hidden value="{{$hospital_name}}">

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


@endsection
