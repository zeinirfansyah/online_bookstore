<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index(Request $request)
    {

        // Use a dynamic query to adjust based on the book_category's role
        $book_categories_query = BookCategory::query();

        // Search by category_name, or everything if a search query is provided
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $book_categories_query->where(function ($query) use ($searchQuery) {
                $query->where('category_name', 'like', "%$searchQuery%")
                    ->orWhere('category_description', 'like', "%$searchQuery%");
            });
        }

        // Paginate the results with 8 items per page
        $book_categories = $book_categories_query->paginate(8);

        // count
        $totalBooks = Book::count();
        $totalCategories = BookCategory::count();
        $totalSuppliers = Supplier::count();
        $totalCustomers = User::where('role', 'customer')->count();

        return view('dashboard.book_categories.index', [
            'book_categories' => $book_categories,

            // counts
            'totalBooks' => $totalBooks,
            'totalCategories' => $totalCategories,
            'totalSuppliers' => $totalSuppliers,
            'totalCustomers' => $totalCustomers
            
        ]);
    }

    public function createBookCategory() {
        $book_categories = BookCategory::paginate(5);
        return view('dashboard.book_categories.create', ['book_categories' => $book_categories]);
    }

    public function updateBookCategory($id) {
        $book_category = BookCategory::find($id);
        $book_categories = BookCategory::paginate(5);
        return view('dashboard.book_categories.update', compact('book_category', 'book_categories'));
    }

    public function storeBookCategory(Request $request) {
        $validate = $request->validate([
            'category_name' => 'required | unique:book_categories,category_name',
        ], [
            'category_name.required' => 'Category name is required',
            'category_name.unique' => 'Category name already exists',
        ]);

        $book_category =[
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $book_category = BookCategory::create($book_category);

        return redirect()->route('book_categories.index')->with('success', 'Book category created successfully');
    }

    public function editBookCategory(Request $request, $id) {
        $book_category = BookCategory::find($id);

        $validate = $request->validate([
            'category_name' => 'required',
        ], [
            'category_name.required' => 'Category name is required',
        ]);

        $book_category =[
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $book_category = BookCategory::where('id', $id)->update($book_category);

        return redirect()->route('book_categories.index')->with('success', 'Book category updated successfully');
    }

    public function deleteBookCategory($id) {
        $book_category = BookCategory::find($id);
        $book_category->delete();

        return redirect()->route('book_categories.index')->with('success', 'Book category deleted successfully');
    
    }
}
