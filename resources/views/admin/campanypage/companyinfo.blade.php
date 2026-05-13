@extends('admin.layout')
@section('content')

    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              {{-- <h2 class="mb-2 page-title">Data table</h2> --}}
              <p class="card-text">List of Company Details </p>
              <div class="d-flex justify-content-end mb-4 ">
            
              
               <button class="btn btn-secondary mx-4"  >
               
              <i class="bi bi-filetype-pdf"></i> Export PDF
            </button>
            <button class="btn btn-secondary"  >
               
              <i class="bi bi-printer-fill"></i> Print
            </button>
              </div>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                      {{-- responsive --}}
                      <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle datatables" id="dataTable-1">
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
                             <th>Company</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Date</th>
                             <th>Name</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Date</th>
                             <th>Company</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Date</th>
                            
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
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                                                        <td>Imani Lara</td>
                            <td>(478) 446-9234</td>
                            <td>Asset Management</td>
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                           
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
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                               <td>Imani Lara</td>
                            <td>(478) 446-9234</td>
                            <td>Asset Management</td>
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                            <td>Borland</td>
                            <td>9022 Suspendisse Rd.</td>
                            <td>High Wycombe</td>
                            <td>Jun 8, 2019</td>
                           
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->


      </main>
@endsection