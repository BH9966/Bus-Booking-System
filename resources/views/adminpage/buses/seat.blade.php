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
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Location</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="{{ route('superadmin.users') }}"><span class="ml-1">Stations </span></a>
             
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
                <i class="bi bi-plus-circle-dotted"></i> Add Seat
            </button>
              </div>
            
              <p class="card-text">List of seat per Bus </p>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                <table class="table datatables" id="dataTable-1">
                            <thead>
                                <tr align="center">
                                    <th></th>
                                    <th>#</th>
                                    <th>Bus Name</th>
                                    <th>Seat Number</th>
                                    <th>Seat Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($seats as $index => $seat)
                                    <tr align="center">
                                        <td></td>
                                        <td>{{ $index + 1 }}</td>

                                        <td>
                                            {{ $seat->bus->bus_name ?? 'N/A' }}
                                        </td>

                                        <td>{{ $seat->seat_number }}</td>

                                        <td>
                                            <span class="badge bg-info text-white fs-6">
                                                {{ strtoupper($seat->seat_type) }}
                                            </span>
                                        </td>

                                        <td>
                                            @if ($seat->status === 'active')
                                                <span class="badge bg-success text-white fs-6">Active</span>
                                            @else
                                                <span class="badge bg-danger text-white fs-6">Inactive</span>
                                            @endif
                                        </td>

                                        <td>

                              <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-primary btn-sm">Edit</button>

                                        <form id="delete-form-{{ $seat->id }}"
                                            action="{{ route('deleteseat', $seat->id) }}"
                                            method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <button class="btn btn-danger btn-sm mx-4"
                                                onclick="confirmDelete({{ $seat->id }})">
                                            Delete
                                        </button>
                                      </div>
                                        </td>
                                    </tr>
                                    @empty
                                  <tr>
                                      <td colspan="7" class="text-center text-muted">
                                          No Seat found
                                      </td>
                                  </tr>
                              @endforelse
                            </tbody>
                        </table>
                    
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main>

      {{-- model start --}}

      <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel" >Add Location</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                   <form action="{{ route('addseat') }}" method="POST">
                      @csrf

                      <div class="form-group">
                          <label>Bus</label>
                          <select class="form-control" name="bus_id" required>
                              <option value="">-- Select Bus --</option>
                              @foreach ($buses as $bus)
                                  <option value="{{ $bus->id }}">
                                      {{ $bus->bus_name }} ({{ $bus->plate_number }})
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label>Seat Number</label>
                          <input type="text" class="form-control" name="seat_number" required>
                      </div>

                      <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status" required>
                              <option value="">-- Select status --</option>
                              <option value="active">Active</option>
                              <option value="inactive">Inactive</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label>Seat Type</label>
                          <select class="form-control" name="seat_type" required>
                              <option value="">-- Seat type --</option>
                              <option value="normal">Normal</option>
                              <option value="vip">VIP</option>
                              <option value="disabled">Disabled</option>
                          </select>
                      </div>

                      <button type="submit" class="btn btn-primary">
                          Add New Seat
                      </button>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
    
@endsection