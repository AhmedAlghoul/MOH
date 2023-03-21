@extends('cms.parent')

@section('title','عرض النتائج')

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

    .dataTables_filter {
        float: none;
        text-align: center;
        margin-bottom: 10px;
    }
</style>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endsection


@section('page-name','عرض النتائج ')

@section('small-page-name','عرض النتائج')



@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">عرض النتائج</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table id="mytable" class="table responsive table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th span="1" style="width: 5%">الرقم</th>
                                    <th span="1" style="width: 20%">المسمى الوظيفي</th>
                                    <th span="1" style="width: 15%"> الفئة الوظيفية</th>
                                    <th span="1" style="width: 20%">القسم</th>
                                    <th span="1" style="width: 15%">قيمة المفتاح</th>
                                    <th span="1" style="width: 15%">نوع الاحتساب</th>
                                    <th span="1" style="width: 20%">عدد الموظفين الحالي</th>
                                    <th span="1" style="width: 20%">العدد المطلوب</th>
                                    <th span="1" style="width: 20%">الاحتياج</th>
                                    <th span="1" style="width: 20%">التفاصيل</th>
                                    <th span="1" style="width: 20%">تاريخ الادخال</th>
                                    <th> الأوامر</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($calcResults as $calcResult)
                                <tr>
                                    <td>{{$calcResult->id}}</td>
                                    <td>
                                        @if (!empty($calcResult->employeerole))
                                        {{$calcResult->employeerole->jobtitle_name_ar}}
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($calcResult->classification))
                                        {{$calcResult->classification->job_classification_name}}
                                        @endif

                                    </td>
                                    <td>{{$calcResult->departmentname->tb_managment_name}}</td>
                                    <td>{{$calcResult->key_value}}</td>
                                    {{-- <td>{{$calcResult->calc_type_id}}</td> --}}
                                    @if (null !== $calcResult->calc_type_id && null !== $calcResult->calculatetype)
                                    <td>{{$calcResult->calculatetype->const_name}}</td>
                                    @endif

                                    {{-- <td>{{$calcResult->calculatetype->const_name}}</td> --}}

                                    <td>{{$calcResult->emp_count}}</td>
                                    <td>{{$calcResult->result_calc}}</td>
                                    <td>{{$calcResult->need_emp}}</td>
                                    <td>{{$calcResult->dtl_reuslt}}</td>
                                    <td>{{$calcResult->created_at}}</td>

                                    <td>
                                        {{-- <a href="#" class="btn btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}
                                        <a onclick="showItem({{$calcResult->id}})" class="btn btn-info"
                                            data-toggle="modal" data-target="#myModal" data-id="{{$calcResult->id}}">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        {{-- using javascript method instead of form method --}}

                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{$calcResult->id}})">
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
@include('cms.modal.detailsModal')
@endsection


@section('scripts')
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<script>
    function showItem(id) {
        console.log(id);
        $.ajax({
        url: "{{route('getRowData')}}",
        type: "post",
        dataType : "json",
        data: {
        "id" : id,
        },
        success: function(data) {
            // console.log(data.result);
            // $('#jobtitle').val(data.data.jobtitle_name_ar);
            // document.getElementById("jobtitle").value = data.data.employee_role.jobtitle_name_ar;
            if(data.data.employee_role && data.data.employee_role.jobtitle_name_ar) {
                     $("#jobtitle").val(data.data.employee_role.jobtitle_name_ar);
            }else{
                $("#jobtitle").val("");
            }

            if(data.data.classification && data.data.classification.job_classification_name) {
                     $("#classtype").val(data.data.classification.job_classification_name );
            }else{
                $("#classtype").val("");
            }
                    // $("#dep").val(data.data.department_name.tb_managment_name);
                    $("#dep").val(data.result);
                    $("#keyvalue").val(data.data.key_value);
                    $("#calcType").val(data.data.calculate_type.const_name);
                    $("#empcount").val(data.data.emp_count);
                    $("#result").val(data.data.result_calc);
                    $("#need").val(data.data.need_emp);

                    if(data.data.dtl_reuslt) {
                    $("#details").val(data.data.dtl_reuslt);
                    }else{
                        $("#details").val("");
                    }
                    $("#createdat").val(data.data.created_at);

                     $('#myModal').modal('show');
        }
        });
        // $(document).ready(function(){
        //     $('.btn-info').click(function(){
        //     $('#myModal').modal('show');
        // });
        // });
    }
    // let table = new DataTable('#mytable');
$(document).ready(function() {
$('#mytable').DataTable({
        language: {
        "search": "بحث: ",
        "paginate": {
        "first": "الأول",
        "last": "الأخير",
        "next": "التالي",
        "previous": "السابق"
        },
        "zeroRecords": "لم يتم العثور على سجلات متطابقة",
        "info": "عرض _START_ إلى _END_ من _TOTAL_ سجل",
        "lengthMenu": "أظهر _MENU_ سجل",
        "emptyTable": "لا يوجد بيانات متاحة في الجدول",
        "infoEmpty": "عرض 0 إلى 0 من 0 سجلات",
        "infoFiltered": "(تم تصفية _MAX_ من السجلات)",
        "loadingRecords": "جارٍ التحميل...",
          },
            responsive: {
            details: {
            renderer: function ( api, rowIdx, columns ) {
            var data = $.map( columns, function ( col, i ) {
            return col.hidden ? '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' + '<td><i>data from hidden column: ' + col.columnIndex + '</i><br><b>' + col.title + ':' + '</b></td> ' + '<td>' + table.cell(rowIdx, i).render('display') + '</td>' + '</tr>' : '';
            }).join('');
            return data ? $('<table />').append( data ) : false;
            }
            }
            }

        });
        });
    function confirmDestroy(id){
  Swal.fire({
      title: 'هل أنت متأكد؟',
      text: "لن تستطيع عكس عملية الحذف مرة أخرى!",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'إلغاء',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم, قم بالحذف!',
    }).then((result) => {
  if (result.isConfirmed) {
    destroy(id);
    // showSuccessMessage();

 }})
}
//  implement delete function using axios
function destroy(id){
  axios.delete('/cms/admin/results/'+id)
    .then(function (response) {
  // handle success 2xx-3xx
  console.log(response.data);
  Swal.fire(
    'تم الحذف!',
    'تم حذف النتيجة بنجاح.',
    'success'
  )
  location.reload();

  })
  .catch(function (error) {
  // handle error 4xx-5xx
    console.log(error);
  })
  .then(function () {
  // always executed
  });

}

function showSuccessMessage(){
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'تمت العملية بنجاح',
  showConfirmButton: false,
  timer: 1500
});
}
</script>
@endsection
