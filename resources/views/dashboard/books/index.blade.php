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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Filter and Search</h3>

                            <div class="card-tools">
                                <div
                                    class="input-group input-group-sm"
                                    style="width: 150px"
                                >
                                    <input
                                        type="text"
                                        name="table_search"
                                        class="form-control float-right"
                                        placeholder="Search"
                                    />

                                    <div class="input-group-append">
                                        <button
                                            type="submit"
                                            class="btn btn-default"
                                        >
                                            <i class="fas fa-search"></i>
                                        </button>
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
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        {{-- Add other book details as needed --}}
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr>
                                        <td>
                                            <img
                                                src="{{ $book->image }}"
                                                alt="{{ $book->title }}"
                                                class="img-thumbnail"
                                                style="
                                                    max-width: 100px;
                                                    max-height: 100px;
                                                "
                                            />
                                        </td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>
                                            {{ $book->bookCategory->category_name }}
                                        </td>

                                        <td>
                                            {{ $book->description }}
                                        </td>
                                        {{-- Add other book details as needed --}}
                                        <td>
                                            <a
                                                href="{{ route('books.update', ['id' => $book->id]) }}"
                                                class="btn btn-primary"
                                                >Edit</a
                                            >
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('books.delete', ['id' => $book->id]) }}"
                                                method="POST"
                                            >
                                                @csrf @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                >
                                                    Delete
                                                </button>
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
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div>
    </div>
</div>

@endsection
