<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

        $usersQuery = User::query();
        
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $usersQuery->where(function ($query) use ($searchQuery) {
                $query->where('nama_user', 'like', "%$searchQuery%")
                    ->orWhere('username', 'like', "%$searchQuery%")
                    ->orWhere('email', 'like', "%$searchQuery%");
            });
        }

        $users = $usersQuery->where('role', 'customer')->paginate(10);


         // Retrieve total books
         $totalBooks = Book::count();
         $totalCategories = BookCategory::count();
         $totalSuppliers = Supplier::count();
         $totalCustomers = User::where('role', 'customer')->count();

        return view('dashboard.customers.index', [
            'users' => $users,

            'totalBooks' => $totalBooks,
            'totalCategories' => $totalCategories,
            'totalSuppliers' => $totalSuppliers,
            'totalCustomers' => $totalCustomers,
        ]);
    }
}
