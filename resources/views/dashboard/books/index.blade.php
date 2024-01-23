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
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
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
                                                            @csrf
                                                            @method('DELETE')
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
                                        <br>
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
        </div>
    </div>
</div>
@endsection

