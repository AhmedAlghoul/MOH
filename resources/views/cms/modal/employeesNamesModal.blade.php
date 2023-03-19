<html>
<head></head>
<body>


<div class="modal fade" id="employeesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">عرض التفاصيل</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Insert your information here -->
                <div class="card-body table-responsive p-0">
                <table id="employees_data" class="table responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>الرقم الوظيفي</th>
                            <th>الاسم</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- table rows will be dynamically added here using JavaScript -->
                    </tbody>
                </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
</body>

{{-- <script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
<script src="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>


    $(document).ready(function() {
    $('#employees_data').DataTable({
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

    });
    });

</script> --}}

</html>
