@extends('adminpage.layout')
@section('vertical_nav')
     <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard_superadmin') }}">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item ">
              <a href="{{ route('dashboard_superadmin') }}" data-toggle="collapse" aria-expanded="false" class=" nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            {{-- <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">UI elements</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Colors</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-typograpy.html"><span class="ml-1 item-text">Typograpy</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-icons.html"><span class="ml-1 item-text">Icons</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-buttons.html"><span class="ml-1 item-text">Buttons</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-notification.html"><span class="ml-1 item-text">Notifications</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-modals.html"><span class="ml-1 item-text">Modals</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-tabs-accordion.html"><span class="ml-1 item-text">Tabs & Accordion</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-progress.html"><span class="ml-1 item-text">Progress</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Forms</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./form_elements.html"><span class="ml-1 item-text">Basic Elements</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./form_advanced.html"><span class="ml-1 item-text">Advanced Elements</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./form_validation.html"><span class="ml-1 item-text">Validation</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./form_wizard.html"><span class="ml-1 item-text">Wizard</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./form_layouts.html"><span class="ml-1 item-text">Layouts</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./form_upload.html"><span class="ml-1 item-text">File upload</span></a>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item dropdown">
              <a href="#campany" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="bi bi-bus-front"></i>
                <span class="ml-3 item-text">Buses</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="campany">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('admin_buses') }}"><span class="ml-1 item-text">Buses list</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('admin_view_seat') }}"><span class="ml-1 item-text">Seat</span></a>
                </li>
              </ul>
            </li>
             <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
             <i class="bi bi-geo-alt-fill"></i>
                <span class="ml-3 item-text">Location</span>
              </a>
               <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="{{ route('region') }}"><span class="ml-1">Region </span></a>

              </ul>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="{{ route('viewlocation') }}"><span class="ml-1">Location </span></a>

              </ul>
            </li>
           <li class="nav-item dropdown">
              <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
           <i class="fe fe-navigation fe-16"></i>
                <span class="ml-3 item-text">Roots</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('viewroute') }}"><span class="ml-1 item-text">Roots List</span></a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link pl-3" href="./chart-chartjs.html"><span class="ml-1 item-text">Chartjs</span></a>
                </li> --}}

              </ul>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('trip') }}">
               <i class="fe fe-git-branch fe-16"></i>
                <span class="ml-3 item-text">Trip</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
               <i class="bi bi-credit-card"></i>
                <span class="ml-3 item-text">Report</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
                <a class="nav-link pl-3" href="./files-list.html"><span class="ml-1">Files List</span></a>
                <a class="nav-link pl-3" href="./files-grid.html"><span class="ml-1">Files Grid</span></a>
              </ul>
            </li>
             <li class="nav-item dropdown">
              <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-book fe-16"></i>
                <span class="ml-3 item-text">Contacts</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Contact List</span></a>
                <a class="nav-link pl-3" href="./contacts-grid.html"><span class="ml-1">Contact Grid</span></a>
                <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">New Contact</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-compass fe-16"></i>
                <span class="ml-3 item-text">Help Desk</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="support">
                <a class="nav-link pl-3" href="./support-center.html"><span class="ml-1">Home</span></a>
                <a class="nav-link pl-3" href="./support-tickets.html"><span class="ml-1">Tickets</span></a>
                <a class="nav-link pl-3" href="./support-ticket-detail.html"><span class="ml-1">Ticket Detail</span></a>
                <a class="nav-link pl-3" href="./support-faqs.html"><span class="ml-1">FAQs</span></a>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-file fe-16"></i>
                <span class="ml-3 item-text">Pages</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./page-orders.html">
                    <span class="ml-1 item-text">Orders</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./page-timeline.html">
                    <span class="ml-1 item-text">Timeline</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./page-invoice.html">
                    <span class="ml-1 item-text">Invoice</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./page-404.html">
                    <span class="ml-1 item-text">Page 404</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./page-500.html">
                    <span class="ml-1 item-text">Page 500</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./page-blank.html">
                    <span class="ml-1 item-text">Blank</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#auth" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-shield fe-16"></i>
                <span class="ml-3 item-text">Authentication</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="auth">
                <a class="nav-link pl-3" href="./auth-login.html"><span class="ml-1">Login 1</span></a>
                <a class="nav-link pl-3" href="./auth-login-half.html"><span class="ml-1">Login 2</span></a>
                <a class="nav-link pl-3" href="./auth-register.html"><span class="ml-1">Register</span></a>
                <a class="nav-link pl-3" href="./auth-resetpw.html"><span class="ml-1">Reset Password</span></a>
                <a class="nav-link pl-3" href="./auth-confirm.html"><span class="ml-1">Confirm Password</span></a>
              </ul>
            </li>

          </ul>

        </nav>
@endsection
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="mb-1 text-dark font-weight-bold">Trip Operations</h4>
                        <p class="text-muted small mb-0">Manage and schedule intercity bus routes and trip timetables</p>
                    </div>
                    <button class="btn btn-primary d-inline-flex align-items-center shadow-sm px-3 py-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#eventModal">
                        <i class="bi bi-plus-circle-dotted me-2 fs-5"></i> Add New Trip
                    </button>
                </div>

                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow border-0 rounded-lg">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle datatables" id="dataTable-1">
                                        <thead class="thead-light bg-light">
                                            <tr align="center" class="text-secondary small fw-bold">
                                                <th>#</th>
                                                <th>Bus Name</th>
                                                <th>Route</th>
                                                <th>Travel Date</th>
                                                <th>Leaving Time</th>
                                                <th>Arrival Time (hrs)</th>
                                                <th>Pickup Location</th>
                                                <th>Destination Stop</th>
                                                <th>Available seats</th>
                                                <th>Price</th>
                                                <th>Trip Code</th>
                                                <th>Trip Status</th>
                                                <th>Bus trip status</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($trips as $key => $trip)
                                            <tr align="center" class="small">
                                                <td class="fw-bold text-secondary fs-1">{{ $trips->firstItem() + $key }}</td>
                                                <td class="fw-semibold text-dark fs-1">{{ $trip->bus->bus_name ?? '-' }}</td>
                                                <td>
                                                    <span class="badge bg-light text-dark border p-2 rounded-pill fs-1">
                                                        {{ $trip->route->fromRegion->name ?? '-' }} 
                                                        <i class="bi bi-arrow-right text-primary mx-1 "></i> 
                                                        {{ $trip->route->toRegion->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td><i class="bi bi-calendar3 me-1 text-muted"></i>{{ $trip->departure_date }}</td>
                                                <td class="text-primary fw-semibold">{{ $trip->departure_time }}</td>
                                                <td class="text-muted">{{ $trip->arrival_time }}</td>
                                                <td><span class="text-truncate d-inline-block fs-1" style="max-width: 120px;">{{ $trip->boardingPoint->name ?? '-' }}</span></td>
                                                <td><span class="text-truncate d-inline-block fs-1" style="max-width: 120px;">{{ $trip->droppingPoint->name ?? '-' }}</span></td>
                                                <td>
                                                    <span class="fw-bold {{ $trip->available_seats > 5 ? 'text-success fs-1' : 'text-danger fs-1' }}">
                                                        {{ $trip->available_seats }}
                                                    </span>
                                                </td>
                                                <td class="fw-bold text-dark fs-1">{{ number_format($trip->price) }} TZS</td>
                                                <td><code class="text-dark bg-light px-2 py-1 rounded border fw-bold fs-1">{{ $trip->trip_code }}</code></td>
                                                <td>
                                                    <span class="badge px-2.5 py-1.5 rounded-pill
                                                        @if($trip->status == 'cancelled') bg-secondary text-white fs-1
                                                        @elseif($trip->status == 'scheduled') bg-warning text-dark fs-1
                                                        @elseif($trip->status == 'completed') bg-success text-white fs-1
                                                        @else bg-danger text-white fs-1
                                                        @endif">
                                                        {{ ucfirst($trip->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge px-2.5 py-1.5 rounded-pill
                                                        @if($trip->bus_status == 'waiting') bg-light text-secondary border fs-1
                                                        @elseif($trip->bus_status == 'boarding') bg-info text-dark fs-1
                                                        @elseif($trip->bus_status == 'departed') bg-primary text-white fs-1
                                                        @elseif($trip->bus_status == 'arrived') bg-success text-white fs-1
                                                        @else bg-danger text-white
                                                        @endif">
                                                        {{ ucfirst($trip->bus_status) }}
                                                    </span>
                                                </td>
                                                <td class="text-muted text-capitalize small">{{ optional($trip->creator)->name }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button class="btn btn-sm btn-outline-primary px-2.5 py-1 d-inline-flex align-items-center">
                                                            <i class="bi bi-pencil-square me-1"></i> Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-danger px-2 py-1">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="15" class="text-center py-5 text-muted">
                                                    <i class="bi bi-layers fs-2 mb-2 d-block text-opacity-20 text-dark"></i>
                                                    No deployment trips logged in system database matches queries.
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="small text-muted">
                                        Showing records {{ $trips->firstItem() }} to {{ $trips->lastItem() }} of {{ $trips->total() }} total entries
                                    </div>
                                    <div>
                                        {{ $trips->links() }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div> 
    </div> 

    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-lg rounded-xl" style="border-radius: 0.75rem; overflow: hidden;">
                <div class="modal-header bg-light border-bottom px-4 py-3 align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-plus-circle text-primary fs-5 me-2"></i>
                        <h5 class="modal-title fw-bold text-dark mb-0" id="eventModalLabel">Create Dispatch Trip</h5>
                    </div>
                    <button type="button" class="btn-close shadow-none border-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-white">
                    <livewire:trip-form />
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
