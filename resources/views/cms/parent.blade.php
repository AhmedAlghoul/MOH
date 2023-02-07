<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> لوحة التحكم | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('cms/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet"
    href="{{asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('cms/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('cms/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('cms/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('cms/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{asset('cms/dist/css/custom.css')}}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
  <style>
    .image {
      padding-right: 18px;
    }
  </style>
  @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('cms.homepage')}}" class="nav-link">الرئيسية</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('keycalc.create')}}" class="nav-link">حساب مفتاح الكادر البشري</a>
        </li>

      </ul>

      <!-- SEARCH FORM -->
      {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="البحث" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> --}}

      <!-- Right navbar links -->
      {{-- <ul class="navbar-nav mr-auto-navbav">

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>

      </ul> --}}
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('cms.homepage')}}" class="brand-link">
        <img src="{{asset('cms/dist/img/moh.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">وزارة الصحة</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('cms/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name;}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="{{route('cms.homepage')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  الصفحة الرئيسية

                </p>
              </a>
            </li>
            {{-- @canany(['update', 'view', 'delete'], $post)

            @endcanany --}}



            {{-- facilliets --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hospital"></i>
                    <p>
                        المرافق
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('hospital.index')}}" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                            <p>عرض</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('hospital.create')}}" class="nav-link">
                            <i class="fas fa-plus-square nav-icon"></i>
                            <p>إنشاء</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- circles --}}
            {{-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  الدوائر
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('circle.index')}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>عرض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('circle.create')}}" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>إنشاء</p>
                  </a>
                </li>
              </ul>
            </li> --}}
            {{-- departments --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        الأقسام
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('show-department')
                    <li class="nav-item">
                        <a href="{{route('department.index')}}" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                            <p>عرض</p>
                        </a>
                    </li>
                    @endcan
                    @can('create-department')
                    <li class="nav-item">
                        <a href="{{route('department.create')}}" class="nav-link">
                            <i class="fas fa-plus-square nav-icon"></i>
                            <p>إنشاء</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li> --}}





            <li class="nav-item has-treeview">
              <a href="{{route('employeeroles.index')}}" class="nav-link">
                <i class="nav-icon fas fa-file-signature"></i>
                <p>
المسميات الوظيفية
                    {{-- <i class="fas fa-angle-left right"></i> --}}
                </p>
              </a>
              {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('employeeroles.index')}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>عرض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('employeeroles.create')}}" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>إنشاء</p>
                  </a>
                </li>
              </ul> --}}
            </li>
            {{-- specalities Keys --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-key nav-icon"></i>
                <p>
                  مفتاح كادر التخصصات
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('key.index')}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>عرض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('key.create')}}" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>إنشاء</p>
                  </a>
                </li>
              </ul>
            </li>
            {{--The method of key calculating --}}
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link"> --}}
              {{-- <i class="nav-icon fas fa-key nav-icon"></i> --}}
              {{-- <i class="nav-icon fas fa-question-circle"></i>
              <p>
                طريقة حساب المفاتيح
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('key.index')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>عرض</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('keycalculatemethod')}}" class="nav-link">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>إنشاء</p>
                </a>
              </li>
            </ul>
          </li>--}}
            <li class="nav-item">
              <a href="{{route('keycalc.create')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب مفتاح الكادر البشري
                </p>
              </a>
            </li>

            {{-- <li class="nav-item">
              <a href="{{route('keycalc.index')}}" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  عرض نتائج حساب المفتاح
                </p>
              </a>
            </li> --}}

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
        <p>
            عرض نتائج حساب المفتاح
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('doctors.index')}}" class="nav-link">
                <i class="fas fa-user-md"></i>
                <p>الأطباء</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('nurses.index')}}" class="nav-link">
                <i class="fas fa-user-nurse"></i>
                <p>التمريض</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('pharmacy.index')}}" class="nav-link">
             <i class="fas fa-prescription"></i>
                <p>الصيدلة</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('medicalimaging.index')}}" class="nav-link">
                <i class="fas fa-solid fa-x-ray"></i>
                <p>أخصائي الأشعة</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('phiscaltherapist.index')}}" class="nav-link">
            <i class="fab fa-accessible-icon"></i>
                <p>أخصائي العلاج الطبيعي</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('Laboratry.index')}}" class="nav-link">
            <i class="fas fa-flask"></i>
                <p>فنيين المختبرات</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('administratives.index')}}" class="nav-link">
                <i class="fas fa-users"></i>
                <p>الإداريين</p>
            </a>
        </li>
    </ul>
</li>

{{-- view results due to work place --}}

<li class="nav-item has-treeview">
    <a href="{{route('facilityresult.create')}}" class="nav-link">
      <i class="nav-icon fas fa-map-marked-alt"></i>
      <p>
        عرض النتائج حسب المرفق
      </p>
    </a>

  </li>
  <li class="nav-item has-treeview">
    <a href="{{route('facilityresult')}}" class="nav-link">
      <i class="nav-icon fas fa-map-marked-alt"></i>
      <p>
      صفحة عرض المرفق-مؤقت
      </p>
    </a>

  </li>
{{-- <li class="nav-item">
        <a href="{{route('keycalc.create')}}" class="nav-link">
            <i class="nav-icon fas fa-calculator"></i>
            <p>
                حساب مفتاح الكادر البشري
            </p>
        </a>
    </li> --}}

            {{-- <li class="nav-item">
              <a href="{{route('doctorcalc')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب مفتاح الأطباء
                </p>
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a href="{{route('doctorsecond')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  مخفي- حساب مفتاح الأطباء
                </p>
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a href="{{route('nursecalc')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب التمريض
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('pharmacycalc')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب مفتاح الصيدلة
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('physicaltherapycalc')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب العلاج الطبيعي
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('medicalimagingcalc')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب الأشعة
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('laboratorycalc')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب مفتاح المختبرات
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('administrativecalc')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                  حساب مفتاح الإداريين
                </p>
              </a>
            </li> --}}
{{--
            <li class="nav-header">الموظفين</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  الموظفين
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('employee.index')}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>عرض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('employee.create')}}" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>إنشاء</p>
                  </a>
                </li>
              </ul>
            </li> --}}

            {{-- spatie roles for users --}}

            <li class="nav-header">الصلاحيات و الأدوار الوظيفية</li>
            {{-- Roles --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>
                  منح الأدوار الوظيفية
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('roles.index')}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>عرض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('roles.create')}}" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>إنشاء</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- permissions --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-magic"></i>
                <p>
                  منح الصلاحيات
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('permissions.index')}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>عرض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('permissions.create')}}" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>إنشاء</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">مستخدمي النظام</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  المستخدمين
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>عرض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('users.create')}}" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>إنشاء</p>
                  </a>
                </li>
              </ul>
            </li>

            {{-- settings --}}
            <li class="nav-header">الإعدادات</li>
            <li class="nav-item">
              <a href="{{route('cms.changepassword')}}" class="nav-link">
                <i class="nav-icon fas fa-lock"></i>
                <p>

                  تغيير كلمة المرور

                  {{-- <span class="badge badge-info right">2</span> --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('cms.logout')}}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  تسجيل الخروج
                </p>
              </a>
            </li>


            {{-- end settings --}}
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('page-name')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('cms.homepage')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active">@yield('small-page-name')</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->

      @yield('content')
      {{-- <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section> --}}
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> جميع الحقوق محفوظة </strong>
    <a href="https://www.moh.gov.ps/portal/" target="_blank"> وزارة الصحة-غزة &copy;</a>
    <strong> تصميم وتطوير </strong>
    <a href="https://www.linkedin.com/in/ahmedalghoul/" target="_blank"> م.أحمد الغول </a>

    <div class="float-right d-none d-sm-inline-block">
      <b> النسخة</b> {{env('App_Version')}}
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('cms/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 rtl -->
  <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Sparkline -->
  <script src="{{asset('cms/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('cms/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('cms/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('cms/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('cms/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('cms/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('cms/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('cms/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('cms/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('cms/dist/js/pages/dashboard.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('cms/dist/js/demo.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
  <script src="{{asset('js/crud.js')}}"></script>

  @yield('scripts')
  @stack('js')

</body>

</html>
