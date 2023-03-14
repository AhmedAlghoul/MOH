<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">عرض التفاصيل</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Insert your information here -->


                <div class="row">
                    <div class="col-md-6">
                        <label class="mr-2"> المسمى الوظيفي</label>
                        <input type="text" class="form-control" value="{{$calcResult->employeerole->jobtitle_name_ar}}"
                            disabled>

                        <label class="mr-2"> قيمة المفتاح</label>
                        <input type="text" class="form-control" value="{{$calcResult->key_value}}" disabled>

                        <label class="mr-2"> نوع الاحتساب</label>
                        <input type="text" class="form-control" value="{{$calcResult->calculatetype->const_name}}"
                            disabled>

                        <label class="mr-2"> عدد الموظفين الحالي</label>
                        <input type="text" class="form-control" value="{{$calcResult->emp_count}}" disabled>

                        <label class="mr-2"> العدد المطلوب</label>
                        <input type="text" class="form-control" value="{{$calcResult->result_calc}}" disabled>

                        <label class="mr-2"> الاحتياج</label>
                        <input type="text" class="form-control" value="{{$calcResult->need_emp}}" disabled>

                        <label class="mr-2"> التفاصيل</label>
                        <input type="text" class="form-control" value="{{$calcResult->dtl_reuslt}}" disabled>

                        <label class="mr-2"> تاريخ الادخال</label>
                        <input type="text" class="form-control " value="{{$calcResult->created_at}}" disabled>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="mr-2"> القسم</label>
                        <input type="text" class="form-control "
                            value="{{$calcResult->departmentname->tb_managment_name}}" disabled>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
