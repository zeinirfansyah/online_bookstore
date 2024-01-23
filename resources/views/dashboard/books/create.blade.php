@extends('dashboard.layouts.master') @section('content')
<h1>Create New Book</h1>

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

{{-- Form for creating a new book --}}
<form
    action="{{ route('books.store') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ old('title') }}" required />

    <label for="author">Author:</label>
    <input type="text" name="author" value="{{ old('author') }}" required />

    <label for="description">Description:</label>
    <textarea name="description" required>{{ old("description") }}</textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" />

    <label for="price">Price:</label>
    <input type="number" name="price" value="{{ old('price') }}" required />

    <label for="book_category_id">Category:</label>
    <select name="book_category_id" id="book_category_id">
        <option value="" selected disabled>Select Category</option>
        @foreach ($categories as $id => $categoryName)
        <option value="{{ $id }}">{{ $categoryName }}</option>
        @endforeach
    </select>

    <label for="publisher">Publisher:</label>
    <input
        type="text"
        name="publisher"
        value="{{ old('publisher') }}"
        required
    />

    <label for="year">Year:</label>
    <input type="text" name="year" value="{{ old('year') }}" required />

    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" value="{{ old('isbn') }}" />

    <label for="language">Language:</label>
    <input type="text" name="language" value="{{ old('language') }}" required />

    <label for="pages">Pages:</label>
    <input type="number" name="pages" value="{{ old('pages') }}" required />

    <label for="weight">Weight:</label>
    <input type="number" name="weight" value="{{ old('weight') }}" />

    <label for="dimensions">Dimensions:</label>
    <input type="text" name="dimensions" value="{{ old('dimensions') }}" />

    <label for="quantity">Quantity:</label>
    <input
        type="number"
        name="quantity"
        value="{{ old('quantity') }}"
        required
    />

    <button type="submit">Create Book</button>
</form>
@endsection
