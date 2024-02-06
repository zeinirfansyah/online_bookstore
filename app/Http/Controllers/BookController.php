<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::with('bookCategory')->paginate(10);
        return view('dashboard.books.index', ['books' => $books]);
    }

    public function detailBook($id)
    {
        $book = Book::find($id);
        return view('dashboard.books.detail', ['book' => $book]);
    }
    

   
    public function createBook() {
        // Ambil semua kategori buku
    $categories = BookCategory::pluck('category_name', 'id');

    // Kirim data kategori ke view
    return view('dashboard.books.create', compact('categories'));
    }

    public function updateBook($id) {
        $book = Book::find($id);
        $categories = BookCategory::pluck('category_name', 'id');
        return view('dashboard.books.update', compact('book', 'categories'));
    }

    private function handleBookCoverUpload(Request $request, $currentBookCver)
    {
        if ($request->hasFile('bookcover') && $request->file('bookcover')->isValid()) {
            $bookcover = $request->file('bookcover');
            $filename = time() . '.' . $bookcover->getClientOriginalExtension();

            // Save the file in the 'public/bookcovers' directory
            $bookcover->storeAs('public/bookcovers', $filename);

            return $filename; // Return the generated filename
        }

        // If no new bookcover file is provided, return the current bookcover filename
        return $currentBookCver;
    }

    public function storeBook(Request $request) {
        $validate = $request->validate([
            'book_category_id' => 'required',
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required',
            'isbn' => 'unique:books,isbn',
            'language' => 'required|string',
            'price' => 'required|regex:/^[0-9]+$/',
            'quantity' => 'required|regex:/^[0-9]+$/',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'max' => ':attribute maksimal 255 karakter.',
            'min' => ':attribute minimal 8 karakter.',
            'email' => ':attribute harus email.',
            'image' => ':attribute harus jpeg, png, jpg.',
            'mimes' => ':attribute harus jpeg, png, jpg.',
            'max' => ':attribute maksimal 2 MB.',
            'regex' => 'pastikan :attribute hanya diisi oleh angka.',
        ]);

        $filename = $this->handleBookCoverUpload($request, 'default_book_cover.jpg');

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
            'image' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Book::create($book);

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

        $book = Book::where('id', $id)->update($book);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }
}
