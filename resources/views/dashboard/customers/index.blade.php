@extends('dashboard.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer Management</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Customer Management</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div>@includeif('dashboard.layouts.master_stat_cards')</div>
        <!-- filter and search -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <a href="#" class="btn btn-default">Add Customer</a>

                  <div class="card-tools">
                    <form method="GET" action="{{ route('customers.index') }}" class="form-inline">
                      <div class="input-group input-group-sm" style="width: 300px">
                        <input type="text" name="search" class="form-control ml-2" placeholder="Search"
                          value="{{ request('search') }}" />

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          <a
                            href="#">
                            Role
                          </a>
                        </th>
                        <th>
                          <a
                            href="#">
                            Nama User
                          </a>
                        </th>
                        <th>
                          <a
                            href="#">
                            Nomor Telepon
                          </a>
                        </th>
                        <th>
                          <a
                            href="#">
                            Email
                          </a>
                        </th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td>
                          {{ $user->role }}
                        </td>
                        <td>
                          {{ $user->nama_user }}
                        </td>
                        <td>
                          {{ $user->nomor_telpon }}
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          <a href="#" class="btn btn-default">Detail</a>
                          
                          <form action="#" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                              data-target="#deleteModal{{ $user->id }}">
                              Delete
                            </button>

                            <!-- Confirmation alert modal -->
                            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog"
                              aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="deleteModalLabel{{ $user->id }}">Confirmation</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure you want to delete this user?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br />
                  <div class="mx-3">
                    {{ $users->links('pagination::bootstrap-5') }}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div>
    </div>
  </div>
@endsection
