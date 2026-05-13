@extends('admin.layout')
@section('content')
 <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              {{-- <h2 class="mb-2 page-title">Data table</h2> --}}
              <div class="d-flex justify-content-end mb-4 ">
             <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#eventModal">
               
               <i class="bi bi-plus-circle-dotted"></i> Add company
            </button>
              </div>
              <p class="card-text">List of Registered Company and their owner </p>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr align="center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Date</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                           
                            <td>368</td>
                            <td>Imani Lara</td>
                            <td>(478) 446-9234</td>
                            <td>Asset Management</td>
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                            <td>
                                <div class="d-flex gap-1">
                                <a href="#"> <button class="btn  btn-primary btn-sm ms-3 ">Edit</button> </a>
                                <a href="#"> <button class="btn  btn-danger btn-sm mx-4">Delete</button> </a>
                                </div>
                            </td>
                          </tr>

                          <tr>
                           
                            <td>368</td>
                            <td>Imani Lara</td>
                            <td>(478) 446-9234</td>
                            <td>Asset Management</td>
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                            <td>
                                <div class="d-flex gap-1">
                                <a href="#"> <button class="btn  btn-primary btn-sm ms-3 ">Edit</button> </a>
                                <a href="#"> <button class="btn  btn-danger btn-sm mx-4">Delete</button> </a>
                                </div>
                            </td>
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

 <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                   <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">New Event</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                      <form>
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">Title</label>
                          <input type="text" class="form-control" id="eventTitle" placeholder="Add event title">
                        </div>
                        <div class="form-group">
                          <label for="eventNote" class="col-form-label">Note</label>
                          <textarea class="form-control" id="eventNote" placeholder="Add some note for your event"></textarea>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-8">
                            <label for="eventType">Event type</label>
                            <select id="eventType" class="form-control select2">
                              <option value="work">Work</option>
                              <option value="home">Home</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="date-input1">Start Date</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                              </div>
                              <input type="text" class="form-control drgpicker" id="drgpicker-start" value="04/24/2020">
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="startDate">Start Time</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text" id="button-addon-time"><span class="fe fe-clock fe-16"></span></div>
                              </div>
                              <input type="text" class="form-control time-input" id="start-time" placeholder="10:00 AM">
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="date-input1">End Date</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                              </div>
                              <input type="text" class="form-control drgpicker" id="drgpicker-end" value="04/24/2020">
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="startDate">End Time</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text" id="button-addon-time"><span class="fe fe-clock fe-16"></span></div>
                              </div>
                              <input type="text" class="form-control time-input" id="end-time" placeholder="11:00 AM">
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="RepeatSwitch" checked>
                        <label class="custom-control-label" for="RepeatSwitch">All day</label>
                      </div>
                      <button type="button" class="btn mb-2 btn-primary">Save Event</button>
                    </div>
                  </div>
                </div>
              </div>
      </main>

     

@endsection