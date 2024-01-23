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
    action="{{ route('book_categories.store') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf

    <label for="title">Category Name:</label>
    <input
        type="text"
        name="category_name"
        value="{{ old('category_name') }}"
        required
    />

    <label for="author">Category Description:</label>
    <textarea name="category_description" required>{{
        old("category_description")
    }}</textarea>

    <button type="submit">Create Book Category</button>
</form>
@endsection
