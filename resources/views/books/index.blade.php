@extends('layouts.app') @section('content')
<h1>Book List</h1>

@foreach ($books as $book)
<div>
    <!-- image -->
    <img src="{{ $book->image }}" alt="{{ $book->title }}" />
    <h2>{{ $book->title }}</h2>
    <p>{{ $book->author }}</p>
    <p>{{ $book->description }}</p>
    {{-- Add other book details as needed --}}
    <a href="{{ route('books.update', ['id' => $book->id]) }}">Edit</a>
    <form
        action="{{ route('books.delete', ['id' => $book->id]) }}"
        method="POST"
    >
        @csrf @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endforeach

{{ $books->links() }}
@endsection
