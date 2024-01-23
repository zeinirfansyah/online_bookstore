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
    action="{{ route('book_categories.edit', ['id' => $book_category->id]) }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf @method('PUT')

    <label for="category_name">Category Name:</label>
    <input
        type="text"
        name="category_name"
        value="{{ old('category_name', $book_category->category_name) }}"
        required
    />

    <label for="category_description">Category Description:</label>
    <textarea
        name="category_description"
        required
        >{{ old('category_description', $book_category->category_description) }}</textarea
    >

    <button type="submit">Update Book Category</button>
</form>
@endsection
