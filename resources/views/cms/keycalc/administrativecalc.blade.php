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
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>القسم</th>
                        <th>التخصص</th>
                        <th>العدد الحالي</th>
                       

                    </tr>
                </thead>
                <tbody>
                    <tr>
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