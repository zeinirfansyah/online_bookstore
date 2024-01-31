@extends('dashboard.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Book Categories</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Book Categories</li>
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
        <div>@includeif('dashboard.layouts.stat_cards')</div>
        <!-- filter and search -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('book_categories.create') }}" class="btn btn-primary">Add Category</a>

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
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($book_categories as $book_category)
                        <tr>
                          <td>
                            {{ $book_category->category_name }}
                          </td>
                          <td>
                            {{ $book_category->category_description }}
                          </td>
                          <td>
                            <a href="{{ route('book_categories.update', ['id' => $book_category->id]) }}"
                              class="btn btn-primary">Edit</a>

                            <form action="{{ route('book_categories.delete', ['id' => $book_category->id]) }}"
                              method="POST" class="d-inline">
                              @csrf @method('DELETE')
                              <button type="submit" class="btn btn-danger">
                                Delete
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br />
                  <div class="mx-3">
                    {{ $book_categories->links('pagination::bootstrap-5') }}
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
