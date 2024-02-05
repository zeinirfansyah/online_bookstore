@extends('dashboard.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Books</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Books</li>
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
        <!-- Small boxes (Stat box) -->
        <div>@includeif('dashboard.layouts.stat_cards')</div>
        <!-- filter and search -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search" />

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
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
                <div class="table">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Author</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($books as $book)
                          <tr>
                            <td>
                              <img src="{{ $book->image }}" alt="{{ $book->title }}" class="img-thumbnail"
                                style="
                                                        max-width: 100px;
                                                        max-height: 100px;
                                                    " />
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                              {{ $book->bookCategory->category_name }}
                            </td>
    
                            <td>
                              {{ $book->description }}
                            </td>
                            <td>
                                <a href="{{ route('books.update', ['id' => $book->id]) }}"
                                  class="btn btn-primary">Edit</a>
    
                                <form action="{{ route('books.delete', ['id' => $book->id]) }}"
                                  method="POST" class="d-inline">
                                  @csrf @method('DELETE')
                                  <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirmationModal">
                                    Delete
                                  </button>
    
                                  <!-- Confirmation alert modal -->
                                  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                                    aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title" id="confirmationModalLabel">Confirmation</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Are you sure you want to delete this category?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Close
                                          </button>
                                          <button type="submit" class="btn btn-danger">
                                            Delete
                                          </button>
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
                    {{ $books->links('pagination::bootstrap-5') }}
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
