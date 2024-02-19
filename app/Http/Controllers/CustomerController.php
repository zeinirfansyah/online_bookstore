<?php

namespace App\Http\Controllers;

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

        return view('dashboard.customers.index', [
            'users' => $users
        ]);
    }
}
