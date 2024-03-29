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
                                    <th>المفتاح</th>
                                    <th>عدد الأسرة</th>
                                    <th>العدد الحالي</th>
                                    <th>الكادر المطلوب</th>
                                    <th>الاحتياج</th>
                                    <th> الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($nurses as $nurse)
<tr>
    <td>{{$nurse->id}}</td>
    <td>{{$nurse->hospital_name}}</td>
    <td>{{$nurse->department}}</td>
    <td>{{$nurse->key_value}}</td>
    <td>{{$nurse->bed_count}}</td>
    <td>{{$nurse->nurse_count}}</td>
    <td>{{$nurse->need}}</td>
    <td>{{$nurse->result}}</td>
    <td>

        {{-- using javascript method instead of form method --}}
        <a href="#" class="btn btn-danger" onclick="performDestroy({{$nurse->id}},this)">
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
