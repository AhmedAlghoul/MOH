@extends('cms.parent')

@section('title','إضافة مفتاح كادر جديد')

@section('styles')
<style>
  .form-control {
    width: 40%;
  }

  .card-title {
    float: right;
    font-size: 25px;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection

@section('page-name','إضافة مفتاح كادر جديد')

@section('small-page-name','إضافة مفتاح كادر')

@section('content')

<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary" id="form-card">
    <div class="card-header">
      <h3 class="card-title">إضافة</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form" role="form" method="POST" action="{{route('key.store')}}">
      {{-- csrf must be in the form tag --}}
      @csrf
      <div class="card-body form-row">


        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible col-md-12 ">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
            style="position: relative">×</button>
          <h5><i class="icon fas fa-ban"></i>تنبيه!</h5>
          <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @if (session('success'))

        <div class="alert alert-success alert-dismissible col-md-12">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> رسالة تأكيد!</h5>
          {{ session('success') }}
        </div>
        @endif


        {{-- display all errors --}}
        {{-- <div class="alert alert-danger" class="form-group">
          <ul>
            @foreach ($errors->all() as $error)
            {{ $error }
            @endforeach
          </ul>
        </div> --}}
      <div class="col-md-4">
                <label>القسم</label>
                <div id="jstree">

                </div>

            </div>

            <div class="col-md-8 ">
            <label>المسمى الوظيفي</label>
            <br>
            <select class="form-control js-example-basic-single" id="department-choice" name="role">
                @foreach ($roles as $role)
                <option value="{{$role->jobtitle_code}}">{{$role->jobtitle_name_ar}}</option>
                @endforeach
            </select>
            <br>
            <label >نوع الاحتساب</label>
            <br>
            <select class="form-control js-example-basic-single " name="calc_type">
                @foreach ($constants as $constant)
                <option value="{{$constant->const_id}}">{{$constant->const_name}}</option>
                @endforeach
            </select>
            <br>
            <label>مفتاح الكادر </label>
            <input type="number" step=any min=0 name="key_value" class="form-control" placeholder="أدخل مفتاح الكادر">
        </div>

      </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">إضافة</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
<!-- /.card -->



@endsection


@section('scripts')
<script>
    $(document).ready(function(){
    let url ="{{route('treeview')}}";
    console.log(url);
    $('#jstree').jstree({
    "core" : {
    'data' : {
    'url' : url,
    'data' : function (node) {
    console.log(node);
    return { 'parent' : node.id };
    }
    },
    "themes" : {
    "theme" : "default",
    "icons" : false
    }
    }
    // "plugins" : [ "wholerow" ]
    });

    });

  $('#jstree').on('changed.jstree', function(e, data) {
    var selectedIds = data.selected;
    console.log(selectedIds);
    $.ajax({
        type: "POST",
        url: "{{route('key.store')}}",
        data: { id: selectedId },
        success: function(response) {
        console.log(response);
        }
        });

    });
</script>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
