@extends('dashboard.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Book Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Book Categories</li>
              <li class="breadcrumb-item active">Create Category</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        @if ($errors->any())
          <div>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif


        <div class="row">
          <div class="col">
            <div class="card p-3">
              <form action="{{ route('book_categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="title" class="form-label">Category Name:</label>
                <input type="text" name="category_name" value="{{ old('category_name') }}" required
                  class="form-control" />

                <label for="author" class="form-label">Category Description:</label>
                <textarea name="category_description" class="form-control">{{ old('category_description') }}</textarea>

                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#confirmationModal">
                  Create Category
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
                                <p>Are you sure you want to add this category?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Create Category
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="card p-3">

              Available book categories:
              <ul>
                @foreach ($book_categories as $book_category)
                  <li>
                    {{ $book_category->category_name }}
                  </li>
                @endforeach
              </ul>
              {{ $book_categories->links('pagination::bootstrap-4') }}

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
