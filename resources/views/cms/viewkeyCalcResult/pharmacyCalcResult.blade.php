@extends('cms.parent')

@section('title','عرض نتائج مفتاح الكادر')

@section('styles')
<style>
    .card-title {
        font-size: 20px;
        font-weight: bold;
        float: right;
    }

    .card-header>.card-tools {
        float: left;
    }
</style>
@endsection


@section('page-name','عرض نتائج مفتاح الكادر')

@section('small-page-name','عرض النتائج')



@section('content')

<section class="content">
    <div class="container-fluid">

        <!-- /.row -->

        <div class="col-12">
            {{-- downlad Employee names Excel file --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> عرض نتائج مفتاح الكادر البشري </h3>
                    {{-- <a class="btn btn-success" href="{{ route('file-export') }}">تحميل
                        الأسماء</a> <a class="btn btn-success" href="{{ route('file-export') }}">تحميل
                        الأسماء</a> --}}
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="البحث">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>المستشفى</th>
                                    <th>القسم</th>
                                    <th>عدد الروشتات</th>
                                    {{-- <th>تاريخ التعيين</th> --}}
                                    <th>عدد التقارير الطبية</th>
                                    <th>العدد الحالي</th>
                                    <th>الكادر المطلوب</th>
                                    <th>الاحتياج</th>
                                    <th> الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>
            @foreach ($pharmacies as $pharmacy)
            <tr>
                <td>{{$pharmacy->id}}</td>
                <td>{{$pharmacy->hospital_name}}</td>
                <td>{{$pharmacy->department}}</td>
                <td>{{$pharmacy->number_of_prescriptions}}</td>
                <td>{{$pharmacy->number_of_medical_reports}}</td>
                <td>{{$pharmacy->pharmacist_count}}</td>
                <td>{{$pharmacy->result}}</td>
                <td>{{$pharmacy->need}}</td>
                <td>

        {{-- using javascript method instead of form method --}}
        <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$pharmacy->id}})">
            <i class="fas fa-trash-alt"></i>
        </a>
    </td>
</tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->


    </div>
</section>


@endsection


@section('scripts')
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
<script>
    function performDestroy(id,ref){
confirmDestroy('/cms/admin/pharmacy/'+id,ref);}

</script>


@endsection
