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
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>عدد الروشتات</th>
                        <th>عدد التقارير الطبية</th>
                        <th>العدد الحالي</th>
                        <th>العدد حسب المفتاح</th>
                        <th>فائض/عجز</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td><input type="number"></td>
                        <td><input type="number"></td>
                        <td>
                            10
                        </td>
                        <td></td>
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