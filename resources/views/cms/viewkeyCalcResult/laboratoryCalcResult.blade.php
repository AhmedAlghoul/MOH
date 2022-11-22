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
                    <h3 class="card-title"> عرض نتائج حساب فني المختبرات </h3>
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
                                    <th>العدد الحالي</th>
                                    <th>عدد الفحوصات</th>
                                    <th>المطلوب</th>
                                    <th>الاحتياج</th>
                                    <th> الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach ($lab_technicians as $lab_technician)
                    <tr>
                        <td>{{$lab_technician->id}}</td>
                        <td>{{$lab_technician->hospital_name}}</td>
                        <td>{{$lab_technician->department}}</td>
                        <td>{{$lab_technician->laboratory_technicians_count}}</td>
                        <td>{{$lab_technician->number_of_examinations}}</td>
                        <td>{{$lab_technician->result}}</td>
                        <td>{{$lab_technician->need}}</td>
                        <td>

                            {{-- using javascript method instead of form method --}}
                            <a href="#" class="btn btn-danger" onclick="confirmDestroy({{$lab_technician->id}})">
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
confirmDestroy('/cms/admin/nurses/'+id,ref);}

</script>


@endsection
