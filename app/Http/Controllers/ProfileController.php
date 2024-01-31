<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
     // show profile data
     public function index()
     {
         $user = auth()->user();
         return view('dashboard.profile.index', compact('user'));
     }
}
