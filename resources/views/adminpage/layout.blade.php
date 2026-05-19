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


table th,
table td {
    white-space: nowrap;
}
.btn-close::before {
    content: "×";
    font-size: 24px;
    line-height: 1;
}
/* table */
/* Desktop (default) */
#dataTable-1 td,
#dataTable-1 th {
    font-size: 13px;
}

/* Tablets */
@media (max-width: 992px) {
    #dataTable-1 td,
    #dataTable-1 th {
        font-size: 12px;
    }
}

/* Mobile phones */
@media (max-width: 576px) {
    #dataTable-1 td,
    #dataTable-1 th {
        font-size: 11px;
    }
}
@media (max-width: 576px) {
    #dataTable-1 td,
    #dataTable-1 th {
        padding: 4px 6px;
        line-height: 1.2;
    }
}

</style>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      @include('SuperAdmin.topnav')
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
   @yield('vertical_nav')
      </aside>
     @yield('content')
      
      <!-- main -->
    </div> <!-- .wrapper -->
 @include('SuperAdmin.script')
@if (session('errors'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: "{{ session('errors') }}",
        showConfirmButton: false,
        timer: 1500
    });
});
</script>
@endif
<script>
 document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        
        @if(session('error'))
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    
    
    });
</script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This company will be deleted permanently!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
  </body>
</html>