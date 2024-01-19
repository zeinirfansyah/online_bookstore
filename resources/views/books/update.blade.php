@extends('layouts.app') @section('content')
<h1>Edit Book</h1>

{{-- Display validation errors --}}
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- Form for updating the book --}}
<form
    action="{{ route('books.edit', ['id' => $book->id]) }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf @method('PUT')

    <label for="title">Title:</label>
    <input
        type="text"
        name="title"
        value="{{ old('title', $book->title) }}"
        required
    />

    <label for="author">Author:</label>
    <input
        type="text"
        name="author"
        value="{{ old('author', $book->author) }}"
        required
    />

    <label for="description">Description:</label>
    <textarea
        name="description"
        required
        >{{ old('description', $book->description) }}</textarea
    >

    <label for="image">Image:</label>
    <input type="file" name="image" />

    <label for="price">Price:</label>
    <input
        type="number"
        name="price"
        value="{{ old('price', $book->price) }}"
        required
    />

    <label for="category">Category:</label>
    <input
        type="text"
        name="category"
        value="{{ old('category', $book->category) }}"
        required
    />

    <label for="publisher">Publisher:</label>
    <input
        type="text"
        name="publisher"
        value="{{ old('publisher', $book->publisher) }}"
        required
    />

    <label for="year">Year:</label>
    <input
        type="text"
        name="year"
        value="{{ old('year', $book->year) }}"
        required
    />

    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" />

    <label for="language">Language:</label>
    <input
        type="text"
        name="language"
        value="{{ old('language', $book->language) }}"
        required
    />

    <label for="pages">Pages:</label>
    <input
        type="number"
        name="pages"
        value="{{ old('pages', $book->pages) }}"
        required
    />

    <label for="weight">Weight:</label>
    <input
        type="number"
        name="weight"
        value="{{ old('weight', $book->weight) }}"
    />

    <label for="dimensions">Dimensions:</label>
    <input
        type="text"
        name="dimensions"
        value="{{ old('dimensions', $book->dimensions) }}"
    />

    <label for="quantity">Quantity:</label>
    <input
        type="number"
        name="quantity"
        value="{{ old('quantity', $book->quantity) }}"
        required
    />

    <button type="submit">Update Book</button>
</form>
@endsection
