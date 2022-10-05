@extends('cms.parent')

@section('title','حساب مفتاح الأشعة')

@section('styles')
<style>
    .card-title {
        float: right;
    }
</style>
@endsection


@section('page-name','حساب مفتاح الأشعة')

@section('small-page-name','حساب مفتاح الأشعة')



@section('content')
<div class="col-md-12">
    <div class="callout callout-warning">
        <h5>طريقة حساب مفتاح قسم الأشعة</h5>
        <p> يكون بناء على نوع الجهاز بحيث أن كل جهاز يحتاج إلى عدد معين من الفنيين </p>
        <ul>
            <li>جهاز أشعة عادية يحتاج 2 فني أشعة</li>
            <li>جهاز فلورو يحتاج 2 فني أشعة</li>
            <li>جهاز الأشعة المقطعية يحتاح 3 فني أشعة</li>
            <li>جهاز الرنين المغناطيسي يحتاج 3 فني أشعة</li>
        </ul>

    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">حساب ناتج مفتاح الأشعة </h3>

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
                        <th>العدد الحالي</th>

                        <th>الأجهزة المتوفرة وعددها</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>{{$department}}</td>
                        <td>{{$ray_technician_count}}</td>

                        <td><input type="checkbox" id="X-rays" name=" أشعة عادية " value="2" onclick="dynInput(this);">
                            <label for="X-rays">أشعة عادية</label>


                            <input type="checkbox" id="Fluoroscopy" name=" فلورو " value="2" onclick="dynInput(this);">
                            <label for="Fluoroscopy"> فلورو</label>

                            <br>
                            <input type="checkbox" id="ct-scan" name=" الأشعة المقطعية " value="3"
                                onclick="dynInput(this);">
                            <label for="ct-scan"> أشعة مقطعية</label>

                            <input type="checkbox" id="mri" name=" الرنين المغناطيسي " value="3"
                                onclick="dynInput(this);">
                            <label for="mri">الرنين المغناطيسي</label>

                        </td>
                        <td>
                            <p id="insertinputs"></p>
                        </td>



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
<script type="text/javascript">
    function dynInput(cbox) {
  if (cbox.checked) {
    var input = document.createElement("input");
    input.type = "number";
    $(input).width("20%");
    var div = document.createElement("div");
    div.id = cbox.id;
    div.innerHTML = "عدد أجهزة"+ cbox.name;
    div.appendChild(input);
    //give the input a unique id
    // input.id = cbox.id + "input";
    document.getElementById("insertinputs").appendChild(div);
  } else {
    document.getElementById(cbox.name).remove();
  }
}
</script>
@endsection