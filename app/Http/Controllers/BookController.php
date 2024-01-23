<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::paginate(8);

        return view('dashboard.books.index', ['books' => $books]);
    }

    public function createBook() {
        return view('dashboard.books.create');
    }

    public function updateBook($id) {
        $book = Book::find($id);
        return view('dashboard.books.update', compact('book'));
    }

    public function storeBook(Request $request) {
        $validate = $request->validate([
            'book_category_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'language' => 'required',
            'pages' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'book_category_id.required' => 'Book category is required',
            'title.required' => 'Title is required',
            'author.required' => 'Author is required',
            'description.required' => 'Description is required',
            'publisher.required' => 'Publisher is required',
            'year.required' => 'Year is required',
            'language.required' => 'Language is required',
            'pages.required' => 'Pages is required',
            'price.required' => 'Price is required',
            'quantity.required' => 'Quantity is required',
            'image' => 'Image must be a file of type: jpeg, png, jpg, gif, svg. Max: 2048 KB',
        ]);

        $book =[
            'book_category_id' => $request->book_category_id,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'isbn' => $request->isbn,
            'language' => $request->language,
            'pages' => $request->pages,
            'weight' => $request->weight,
            'dimensions' => $request->dimensions,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $book = Book::create($book);

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    public function deleteBook($id) {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    
    }

    public function editBook(Request $request, $id) {
        $book = Book::find($id);

        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'category' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'language' => 'required',
            'pages' => 'required',
            'quantity' => 'required',
        ], [
            'title.required' => 'Title is required',
            'author.required' => 'Author is required',
            'description.required' => 'Description is required',
            'image' => 'Image must be a file of type: jpeg, png, jpg, gif, svg. Max: 2048 KB',
            'price.required' => 'Price is required',
            'category.required' => 'Category is required',
            'publisher.required' => 'Publisher is required',
            'year.required' => 'Year is required',
            'language.required' => 'Language is required',
            'pages.required' => 'Pages is required',
            'quantity.required' => 'Quantity is required',
        ]);

        $book =[
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'category' => $request->category,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'isbn' => $request->isbn,
            'language' => $request->language,
            'pages' => $request->pages,
            'weight' => $request->weight,
            'dimensions' => $request->dimensions,
            'quantity' => $request->quantity,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $book = Book::where('id', $id)->update($book);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }
}
