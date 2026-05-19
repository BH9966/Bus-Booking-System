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
                <a class="nav-link pl-3" href="{{ route('viewlocation') }}"><span class="ml-1">Station </span></a>
             
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
              {{-- <h2 class="mb-2 page-title">Data table</h2> --}}
              <div class="d-flex justify-content-end mb-4 ">
             <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal">
                <i class="bi bi-plus-circle-dotted"></i> Add Trip
            </button>
              </div>
              <p class="card-text">List of All Trip </p>


              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                      {{-- responsive --}}
                      <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr align="center">
                            <th></th>
                            <th>#</th>
                            <th>Bus Name</th>
                            <th>Route</th>
                            <th>Travel Date</th>
                            <th>Leaving Time</th>
                            <th>Arrival Time (hrs)</th>
                            <th>Pickup Location </th>
                            <th>Destination Stop </th>
                            <th>Available seats</th>
                            <th>Price</th>
                            <th>Trip Code</th>
                            <th>Trip Status</th>
                            <th>Bus trip status</th>
                            <th>Created By</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                       <tbody>
                        @forelse($trips as $key => $trip)
                        <tr align="center">

                            <td>{{ $trips->firstItem() + $key }}</td>

                            <td><strong>{{ $trip->trip_code }}</strong></td>

                            <td>{{ $trip->bus->bus_name ?? '-' }}</td>

                            <td>
                                {{ $trip->route->fromLocation->name ?? '-' }}
                                →
                                {{ $trip->route->toLocation->name ?? '-' }}
                            </td>

                            <td>{{ $trip->departure_date }}</td>

                            <td>
                                {{ $trip->departure_time }} -
                                {{ $trip->arrival_time }}
                            </td>

                            <td>{{ number_format($trip->price) }} TZS</td>

                            <td>{{ $trip->available_seats }}</td>

                            <td>
                                <span class="badge bg-info">
                                    {{ ucfirst($trip->trip_status) }}
                                </span>
                            </td>

                            <td>
                                <span class="badge 
                                    @if($trip->bus_trip_status == 'waiting') bg-secondary
                                    @elseif($trip->bus_trip_status == 'boarding') bg-warning
                                    @elseif($trip->bus_trip_status == 'departed') bg-primary
                                    @elseif($trip->bus_trip_status == 'arrived') bg-success
                                    @else bg-danger
                                    @endif
                                ">
                                    {{ ucfirst($trip->bus_trip_status) }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fe fe-eye"></i>
                                    </button>

                                    <button class="btn btn-primary btn-sm">Edit</button>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted">
                                No trips found
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    
                      </table>
                      {{ $trips->links() }}
                    </div>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div>
 <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

             <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel" >Add Trip</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                    <form action="{{ route('addtrip') }}" method="POST">
                            @csrf

                            <!-- BUS -->
                            <div class="form-group">
                                <label>Bus</label>
                                <select class="form-control" name="bus_id" required>
                                    <option value="">-- Select Bus --</option>
                                    @foreach($buses as $bus)
                                        <option value="{{ $bus->id }}">
                                            {{ $bus->bus_name }} ({{ $bus->bus_number }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- ROUTE -->
                            <div class="form-group">
                                <label>Route</label>
                                <select class="form-control" name="route_id" required>
                                    <option value="">-- Select Route --</option>
                                    @foreach($routes as $route)
                                        <option value="{{ $route->id }}">
                                            {{ $route->fromLocation->name ?? '' }}
                                            →
                                            {{ $route->toLocation->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- DEPARTURE DATE -->
                            <div class="form-group">
                                <label>Departure Date</label>
                                <input type="date" class="form-control" name="departure_date" required>
                            </div>

                            <!-- DEPARTURE TIME -->
                            <div class="form-group">
                                <label>Departure Time</label>
                                <input type="time" class="form-control" name="departure_time" required>
                            </div>

                            <!-- ARRIVAL TIME -->
                            <div class="form-group">
                                <label>Arrival Time</label>
                                <input type="time" class="form-control" name="arrival_time" required>
                            </div>

                            <!-- BOARDING POINT -->
                            <div class="form-group">
                                <label>Boarding Point</label>
                                <select class="form-control" name="boarding_point_id">
                                    <option value="">-- Select Boarding --</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- DROPPING POINT -->
                            <div class="form-group">
                                <label>Dropping Point</label>
                                <select class="form-control" name="dropping_point_id">
                                    <option value="">-- Select Dropping --</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- PRICE -->
                            <div class="form-group">
                                <label>Price (TZS)</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>

                            <!-- STATUS (OPTIONAL) -->
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="trip_status">
                                    <option value="scheduled">Scheduled</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>

                            <!-- SUBMIT -->
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    Create Trip
                                </button>
                            </div>

                        </form>
                    </div>
                    
                  </div>
                </div>
              </div>
      </main>
@endsection