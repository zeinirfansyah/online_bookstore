<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function index(Request $request)
    {
        // Use a dynamic query to adjust based on the user's role
        $usersQuery = User::query();

        // Filter by role if a role is provided in the request
        if ($request->has('role') && $request->role !== 'all roles') {
            $usersQuery->where('role', $request->role);
        }

        // Search by name, role, or everything if a search query is provided
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $usersQuery->where(function ($query) use ($searchQuery) {
                $query->where('nama_user', 'like', "%$searchQuery%")
                    ->orWhere('username', 'like', "%$searchQuery%")
                    ->orWhere('email', 'like', "%$searchQuery%")
                    ->orWhere('role', 'like', "%$searchQuery%");
            });
        }


        // sort data in table column
        if ($request->has('sort_column') && $request->has('sort_order')) {
            $sortColumn = $request->sort_column;
            $sortOrder = $request->sort_order;
            $usersQuery->orderBy($sortColumn, $sortOrder);
        }

        // Paginate the results with 8 items per page without the manager
        $users = $usersQuery->where('role', '!=', 'manager')->paginate(8);

        // Pass the roles to the view for filtering
        $roles = ['all roles', 'admin', 'user'];

        return view('dashboard.users.index', [
            'users' => $users,
            'roles' => $roles,
            'sortColumn' => $request->get('sort_column'),
            'sortOrder' => $request->get('sort_order'),
        ]);
    }

    public function detailUser($id)
    {
        $user = User::find($id);
        return view('dashboard.users.detail', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User data deleted successfully');
    }
}
