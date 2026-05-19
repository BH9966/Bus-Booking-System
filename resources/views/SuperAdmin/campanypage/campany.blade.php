@extends('SuperAdmin.layout')
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
                            <th>Company name</th>
                            <th>License Number</th>
                            <th>TIN number</th>
                            <th>Owner</th>
                            <th>Created by</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ( $companies as $key =>$company) 
                          <tr>
                       
                            <td>{{$companies->firstItem() + $key }}</td>
                            <td>{{ $company->company_name }}</td>
                            <td>{{ $company->license_no }}</td>
                            <td>{{ $company->tin }}</td>
                              <td>{{ optional($company->owner)->name ?? 'N/A' }}</td>
                              <td>{{ \App\Models\User::find($company->created_by)->name ?? 'NO USER FOUND' }}</td>
                            <td>{{$company->status}}</td>
                            <td>
                                <div class="d-flex gap-1">
                                <a href="#"> <button class="btn  btn-primary btn-sm ms-3 ">Edit</button> </a>
                                <form id="delete-form-{{ $company->id }}" action="{{ route('deleteCompany', $company->id) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#"> <button class="btn  btn-danger btn-sm mx-4"  onclick="confirmDelete({{ $company->id }})">Delete</button> </a>
                                </div>
                            </td>
                          </tr>
                           @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">
                                    No Company found
                                </td>
                            </tr>

                       
                          @endforelse
                        </tbody>
                      </table>
                      {{ $companies->links() }}
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
                    <h5 class="modal-title" id="eventModalLabel" >Create New Company</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                     <form action="{{ route('add_company') }}" method="POST">
                         @csrf
                         
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">company name</label>
                        <input type="text" class="form-control" name="company_name" placeholder="company name" required>
                        </div>
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">license Number</label>
                       <input type="number" class="form-control" name="license_no" placeholder="license no" required >
                        </div>
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">TIN number</label>
                       <input type="number" class="form-control" name="tin_no" placeholder="tin no" required>
                        </div>
                        <div class="form-group">
                          <label for="eventNote" class="col-form-label">VAT no</label>
                        <input type="number" class="form-control" name="vat_no" placeholder="vat no" required >
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-8">
                            <label for="eventType">Owner</label>
                           <select class="form-control" name="owner_user_id" required >
                             <option >-----select owner---</option>
                             @foreach($admins as $admin)
                                <option value="{{$admin->id}}">{{ $admin->name }} ({{ $admin->email }})</option>
                               @endforeach
                            </select>
                          </div>
                        </div>
                      
                       <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" name="submit" id="saveBtn" class="btn btn-primary">
                           Create Company 
                        </button>
                    </div>
  '
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
      </main>

     

@endsection