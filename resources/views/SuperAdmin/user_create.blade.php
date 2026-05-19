@extends('SuperAdmin.layout')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              {{-- <h2 class="mb-2 page-title">Data table</h2> --}}
              <div class="d-flex justify-content-end mb-4 ">
             <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal">
                <i class="bi bi-plus-circle-dotted"></i> Add User
            </button>
              </div>
              <p class="card-text">List of Users </p>
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
                            <th>Full Name</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th>Company Name</th>
                            <th>Email </th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Date</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                       <tbody>
                        @forelse($users as $key=> $user)
                            <tr align="center">
                                <td>{{ $users->firstItem() + $key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ $user->company->company_name ?? '-' }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address ?? '-' }}</td>
                                <td>{{ $user->city ?? '-' }}</td>
                                <td>{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</td>

                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('userdelete', $user->id) }}" method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button class="btn btn-danger btn-sm mx-4"  onclick="confirmDelete({{ $user->id }})">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">
                                    No users found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                      </table>
                      {{ $users->links() }}
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
                    <h5 class="modal-title" id="eventModalLabel" >New User</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                     <form action="{{ route('users.store') }}" method="POST">
                         @csrf
                         
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name" >
                        </div>
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">Phone Number</label>
                       <input type="text" class="form-control" name="phone" placeholder="Phone" >
                        </div>
                        <div class="form-group">
                          <label for="eventTitle" class="col-form-label">Address</label>
                       <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                          <label for="eventNote" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" >
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-8">
                            <label for="eventType">Role</label>
                           <select class="form-control" name="role" >
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                                <option value="customer">guest</option>
                            </select>
                          </div>
                        </div>
                       <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Password" >
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password" >
                        </div>
                       <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" name="submit" id="saveBtn" class="btn btn-primary">
                           Save User
                        </button>
                    </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
      </main>
@endsection