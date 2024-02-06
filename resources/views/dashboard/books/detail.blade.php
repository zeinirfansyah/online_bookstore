@extends('dashboard.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Book Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Book Management</li>
              <li class="breadcrumb-item active">Detail Book</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        @if ($errors->any())
          <div>
            <ul>
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="card p-3">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h3>{{ $book->title }}</h3>
              <strong class="alert alert-info px-2 py-1">{{ $book->bookCategory->category_name }}</strong>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                      <th>Author</th>
                      <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                      <th>Publisher</th>
                      <td>{{ $book->publisher }}</td>
                    </tr>
                    <tr>
                      <th>Description</th>
                      <td>{{ $book->description }}</td>
                    </tr>
                    <tr>
                      <th>ISBN</th>
                      <td>{{ $book->isbn }}</td>
                    </tr>
                    <tr>
                      <th>Pages</th>
                      <td>{{ $book->pages }}</td>
                    </tr>
                    <tr>
                      <th>Price</th>
                      <td>{{ $book->price }}</td>
                    </tr>
                    <tr>
                      <th>Language</th>
                      <td>{{ $book->language }}</td>
                    </tr>
                    <tr>
                      <th>Stock</th>
                      <td>{{ $book->quantity }}</td>
                    </tr>
                    <tr>
                      <th>Category</th>
                      <td>{{ $book->bookCategory->category_name }}</td>
                    </tr>
                  </table>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center">
                    <div class="image">
                        <div class="row">
                          <div class="col">
                            @if ($book->image === 'default_bookcover.jpg')
                              <img src="{{ asset('images/' . $book->image) }}" class="img-fluid rounded"
                                style="height: 300px; width: 200px; object-fit: cover;  border: 5px solid #d7d7d7;">
                            @else
                              <img src="{{ asset('storage/bookcovers/' . $book->image) }}" class="img-fluid rounded"
                                style="height: 300px; width: 200px; object-fit: cover;  border: 5px solid #d7d7d7;" alt="{{ $book->image }}">
                            @endif
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <p class="text-center">{{ $book->title }}</p>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
            <a href="#" class="btn btn-primary">Edit Data</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
