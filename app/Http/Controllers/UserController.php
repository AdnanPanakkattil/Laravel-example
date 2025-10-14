<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('users.create'); // Make sure register.blade.php exists
    }

    /**
     * Handle registration form submission.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
        ]);

        // Create user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Optionally login user
        // auth()->login($user);

        return redirect('/')->with('success', 'User registered successfully!');
    }    
    public function showLoginForm()
{
    return view('/layout'); // or users.login if your view is named like that
}

}
