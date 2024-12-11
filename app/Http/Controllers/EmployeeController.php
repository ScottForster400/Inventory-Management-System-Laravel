<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\d{3}-\d{2}-\d{3}$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validated['first_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect back with a success message and the new user
        return redirect()->back()->with([
            'success' => 'Employee added successfully.',
            'newEmployee' => $user,
        ]);
    }
}
