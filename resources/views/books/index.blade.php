@extends('layouts.app') @section('content')

<div class="container">
    <h1>Book List</h1>
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
                            style="max-width: 100px; max-height: 100px"
                        />
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
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
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
