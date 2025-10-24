<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // <-- import User model

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch users from database
        $users = User::all(); 

        // Pass users to the view
        return view('dashboard.index', compact('users'));
    }
}
