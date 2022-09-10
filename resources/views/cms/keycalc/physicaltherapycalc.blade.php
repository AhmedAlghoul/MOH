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
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>عدد الأخصائيين الحاليين</th>
                        <th>عدد الجلسات </th>
                        <th>العدد المقترح</th>
                        <th>الاحتياج</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td></td>
                        <td></td>
                        <td><input type="number" id="physicins_number" ></td>
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
<script>

document.getElementById("physicins_number").defaultValue = "21";
</script>
@endsection