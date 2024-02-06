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
              <li class="breadcrumb-item active">Create Book</li>
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
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="card p-3">
          <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col">

                <label for="book_category_id" class="form-label">Book_category</label>
                <select name="book_category_id" class="form-control" required>
                  <option value="" disabled>Select Book_category</option>
                  @foreach ($categories as $id => $categoryName)
                  <option value="{{ $id }}">{{ $categoryName }}</option>
                  @endforeach
                </select>

                <label for="nama_user" class="form-label">Book Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan nama lengkap" required class="form-control" />

                <label for="author" class="form-label">Author</label>
                <input name="author" value="{{ old('author') }}" placeholder="Masukkan author" class="form-control" required />
               
                <!-- publisher -->
                <label for="publisher" class="form-label">Publisher</label>
                <input name="publisher" value="{{ old('publisher') }}" placeholder="Masukkan publisher" class="form-control" required/>

                <!-- year select -->
                <label for="year" class="form-label">Year</label>
                <input name="year" value="{{ old('year') }}" placeholder="Masukkan tahun" class="form-control" required/>

                <!-- language -->
                <label for="language" class="form-label">Language</label>
                <input name="language" value="{{ old('language') }}" placeholder="Masukkan bahasa" class="form-control" required/>
                
                <label for="description" class="form-label">Description</label>
                <textarea name="description" placeholder="Masukkan description" rows="3" class="form-control">{{ old('description') }}</textarea>
              </div>
              <div class="col">

                <!-- isbn -->
                <label for="isbn" class="form-label">ISBN</label>
                <input name="isbn" value="{{ old('isbn') }}" placeholder="Masukkan ISBN" class="form-control" />

                <!-- pages -->
                <label for="pages" class="form-label">Pages</label>
                <input name="pages" value="{{ old('pages') }}" placeholder="Masukkan jumlah" class="form-control" />

                <!-- weight -->
                <label for="weight" class="form-label">Weight</label>
                <input name="weight" value="{{ old('weight') }}" placeholder="Masukkan berat" class="form-control" />

                <!-- dimensions -->
                <label for="dimensions" class="form-label">Dimensions</label>
                <input name="dimensions" value="{{ old('dimensions') }}" placeholder="Masukkan dimensi in centimeter" class="form-control" />

                <!-- quantity -->
                <label for="quantity" class="form-label">Quantity</label>
                <input name="quantity" value="{{ old('quantity') }}" placeholder="Masukkan quantity" class="form-control" required/>

              <!-- price -->
                <label for="price" class="form-label">Price</label>
                <input name="price" value="{{ old('price') }}" placeholder="Masukkan harga" class="form-control" required/>

                <label for="bookcover" class="col-md-4 col-form-label text-md-end">{{ __('Book_Cover')}}</label>
                <input id="bookcover" type="file" class="form-control @error('bookcover') is-invalid @enderror" name="bookcover">
                @error('bookcover')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
               
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">
              Create User
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
