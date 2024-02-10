<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $booksQuery = Book::query();

        // search by everything if a search query is provided
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $booksQuery->where(function ($query) use ($searchQuery) {
                $query->where('title', 'like', "%$searchQuery%")
                    ->orWhere('author', 'like', "%$searchQuery%")
                    ->orWhere('publisher', 'like', "%$searchQuery%")
                    ->orWhere('year', 'like', "%$searchQuery%")
                    ->orWhere('isbn', 'like', "%$searchQuery%")
                    ->orWhere('language', 'like', "%$searchQuery%")
                    ->orWhere('price', 'like', "%$searchQuery%")
                    ->orWhere('quantity', 'like', "%$searchQuery%");
            });
        }

        // filter by category if a category is specified in the search query
        if ($request->has('category') && $request->category !== 'all') {
            $categoryQuery = $request->category;
            $booksQuery->whereHas('bookCategory', function ($query) use ($categoryQuery) {
                $query->where('category_name', '=', $categoryQuery);
            });
        }

        // Retrieve all categories for the dropdown
        $categories = BookCategory::all();

        // paginate the results with 10 items per page
        $books = $booksQuery->with('bookCategory')->paginate(10);


        // Retrieve total books
        $totalBooks = Book::count();
        $totalCategories = BookCategory::count();
        $totalSuppliers = Supplier::count();
        $totalCustomers = User::where('role', 'customer')->count();

        return view('dashboard.books.index', [
            'books' => $books,
            'categories' => $categories,
            'totalBooks' => $totalBooks,
            'totalCategories' => $totalCategories,
            'totalSuppliers' => $totalSuppliers,
            'totalCustomers' => $totalCustomers,
        ]);
    }

    public function detailBook($id)
    {
        $book = Book::find($id);
        return view('dashboard.books.detail', ['book' => $book]);
    }



    public function createBook()
    {
        // Ambil semua kategori buku
        $categories = BookCategory::pluck('category_name', 'id');

        // Kirim data kategori ke view
        return view('dashboard.books.create', compact('categories'));
    }

    public function updateBook($id)
    {
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

    public function storeBook(Request $request)
    {
        $validate = $request->validate([
            'book_category_id' => 'required',
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required',
            'isbn' => 'unique:books,isbn',
            'language' => 'required|string',
            'price' => 'required|regex:/^[0-9]+(\.[0-9]+)?$/',
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

        $book = [
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

    public function deleteBook($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function editBook(Request $request, $id)
    {
        $book = Book::find($id);

        $validate = $request->validate([
            'book_category_id' => 'required',
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required',
            'isbn' => 'unique:books,isbn,' . $id,
            'language' => 'required|string',
            'price' => 'required|regex:/^[0-9]+(\.[0-9]+)?$/',
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

        $currentBookCover = $book->image;
        $filename = $this->handleBookCoverUpload($request, $currentBookCover);

        $book = [
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


        $book = Book::where('id', $id)->update($book);

        return redirect()->route('books.detail', ['id' => $id])->with('success', 'Book updated successfully');
    }
}
