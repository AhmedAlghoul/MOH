@extends('cms.parent')

@section('title','')

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
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th style="width: 40px">المفتاح</th>
                        <th>عدد الأسرة </th>
                        <th>عدد الممرضين الحالي</th>
                        <th>الكادر المطلوب</th>
                        <th>الاحتياج</th>

                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>
                            10
                        </td>
                        <td><input type="number"></td>
                        <td></td>
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