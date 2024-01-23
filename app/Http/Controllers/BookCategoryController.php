<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        $book_categories = BookCategory::paginate(8);

        return view('dashboard.book_categories.index', ['book_categories' => $book_categories]);
    }

    public function createBookCategory() {
        return view('dashboard.book_categories.create');
    }

    public function updateBookCategory($id) {
        $book_category = BookCategory::find($id);
        return view('dashboard.book_categories.update', compact('book_category'));
    }

    public function storeBookCategory(Request $request) {
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
