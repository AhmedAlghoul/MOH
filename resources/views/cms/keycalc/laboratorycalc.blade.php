@extends('cms.parent')

@section('title','')

@section('styles')
<style>
    .card-title {
        float: right;
    }
</style>
@endsection


@section('page-name','Title')

@section('small-page-name','title')



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
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>العدد الحالي</th>
                        <th>عدد الفحوصات</th>
                        <th>العدد المطلوب حسب المفتاح</th>
                        <th>فائض/عجز</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td></td>
                        <td><input type="number"></td>
                        <td>
                            10
                        </td>
                        <td></td>
                    </tr>

                </tbody>

            </table>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حساب</button>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
@endsection


@section('scripts')

@endsection