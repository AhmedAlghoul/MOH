@extends('cms.parent')

@section('title','عرض نتائج الأشعة')

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


@section('page-name','عرض نتائج الأشعة')

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
                                    <th>العدد الحالي</th>
                                    <th>عدد أجهزة الأشعة</th>
                                    <th>عدد أجهزة الفلورو</th>
                                    <th>عدد أجهزة الرنين </th>
                                    <th>عدد أجهزة التصوير المقطعي</th>
                                    <th>العدد المقترح</th>
                                    <th>الاحتياج</th>
                                    <th> الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($medicalimaging as $medicalimage)
                                <tr>
                                    <td>{{$medicalimage->id}}</td>
                                    <td>{{$medicalimage->hospital_name}}</td>
                                    <td>{{$medicalimage->department}}</td>
                                    <td>{{$medicalimage->ray_technician_count}}</td>
                                    <td>{{$medicalimage->x_rays}}</td>
                                    <td>{{$medicalimage->Fluoroscopy}}</td>
                                    <td>{{$medicalimage->mri}}</td>
                                    <td>{{$medicalimage->ct_scan}}</td>
                                    <td>{{$medicalimage->result}}</td>
                                    <td>{{$medicalimage->need}}</td>
                                    <td>

                                        {{-- using javascript method instead of form method --}}
                                        <a href="#" class="btn btn-danger" onclick="performDestroy({{$medicalimage->id}},this)">
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
confirmDestroy('/cms/admin/medicalimaging/'+id,ref);}

</script>


@endsection
