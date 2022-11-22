@extends('cms.parent')

@section('title','الصفحة الرئيسية')

@section('styles')
<style>
  #map {

    height: 400px;
    width: 100%;
  }

  .gm-style-iw-d {
    color: black;
  }
</style>

@endsection


@section('page-name','الصفحة الرئيسية')

@section('small-page-name','الرئيسية')



@section('content')

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>
              {{\App\Models\Employee::count()}}
            </h3>

            <p>عدد الموظفين</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{route('employee.index')}}" class="small-box-footer">معلومات اكثر <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            {{-- hospital count statics --}}
            <h3>{{\App\Models\Hospital::count()}}</h3>

            <p>عدد المستشفيات</p>
          </div>
          <div class="icon">
            <i class="ion ion-medkit"></i>
          </div>
          <a href="{{route('hospital.index')}}" class="small-box-footer">معلومات اكثر <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{\App\Models\Department::count()}}</h3>

            <p>عدد الأقسام</p>
          </div>
          <div class="icon">
            <i class="ion ion-clipboard"></i>
          </div>
          <a href="{{route('department.index')}}" class="small-box-footer">معلومات اكثر <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>
    <!-- /.row -->
    {{-- <a href="{{route('test')}}">bitton</a> --}}
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 connectedSortable">

        <!-- Calendar -->
        <div class="card bg-gradient-success">
          <div class="card-header border-0">

            <h3 class="card-title" style="float: right">
              <i class="far fa-calendar-alt"></i>
              التقويم الشهري
            </h3>
            <!-- tools card -->
            <div class="card-tools" style="float: left">
              <!-- button with a dropdown -->
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-bars"></i></button>
                <div class="dropdown-menu float-right" role="menu">
                  <a href="#" class="dropdown-item">Add new event</a>
                  <a href="#" class="dropdown-item">Clear events</a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">View calendar</a>
                </div>
              </div>
              <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body pt-0">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.Left col -->

      <!-- right col -->
      <section class="col-lg-6 connectedSortable">
        <!-- Map -->
        <div class="card bg-gradient-primary">
          <div class="card-header border-0">

            <h3 class="card-title" style="float: right">
              <i class="far fa-map"></i>
              مواقع المستشفيات
            </h3>
            <!-- tools card -->
            <div class="card-tools" style="float: left">
              <!-- button with a dropdown -->

              <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-primary btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.card-header -->

          <div class="card-body pt-0">
            <!--The Map -->
            <div id="map" style="width: 100%"></div>
          </div>
          <!-- /.card-body -->
        </div>

      </section>

      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>


@endsection


@section('scripts')
{{-- <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCodvr4TmsTJdYPjs_5PWLPTNLA9uA4iq8&amp;callback=initMap">
</script>
<script>
  var locations = [
        ['assets/images/avatar.png', -33.890542, 151.274856, 4],
        ['assets/images/avatar-2.png', -33.923036, 151.259052, 5],
        ['assets/images/avatar-3.png', -34.028249, 151.157507, 3],
      ];

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(-33.92, 151.25),
      });



      var marker, i;

      for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map,
          icon:new google.maps.MarkerImage(locations[i][0])
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            var myModal = new bootstrap.Modal(document.getElementById("ModalMap"), {});
            myModal.show();
          }
        })(marker, i));
      }
</script> --}}
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPHfiiXdYkeqGP-pKXjygARGNhUEUn2oM&callback=initMap&v=weekly"
  defer></script>
<script src="{{asset('js/map.js')}}"></script>

@endsection
