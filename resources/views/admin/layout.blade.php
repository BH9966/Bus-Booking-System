<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href=" {{ asset('css/feather.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/select2.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/dropzone.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/uppy.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/jquery.steps.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/quill.snow.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href=" {{ asset('css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('css/app-dark.css') }}" id="darkTheme" disabled>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- icons bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
.btn-close {
    background: none !important;
    font-size: 1.5rem;
    opacity: 1;
}

.btn-close::before {
    content: "×";
    font-size: 24px;
    line-height: 1;
}
</style>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      @include('admin.topnav')
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        @include('admin.vertnav')
      </aside>
     @yield('content')
      
      <!-- main -->
    </div> <!-- .wrapper -->
 @include('admin.script')
  </body>
</html>