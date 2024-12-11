<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Display the list of employees
    public function index(Request $request)
    {
        $searchedName = $request->input('search');
        $user_branch_id = Auth::user()->branch_id;

        // Filter by branch and search term
        $sameBranchUsers = User::where('branch_id', $user_branch_id)
            ->when($searchedName, function ($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->paginate(5);

        return view('manage-employees', compact('sameBranchUsers'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'phone' => 'required|string|regex:/^\d{3}-\d{2}-\d{3}$/', // validate phone format
        'dob' => 'required|date', // validate date of birth
        'address' => 'required|string|max:255', // validate address
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    // Create the new employee
    $user = User::create([
        'name' => $validated['first_name'],
        'phone' => $validated['phone'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'branch_id' => Auth::user()->branch_id, // Assign the branch of the current authenticated user
        'dob' => $validated['dob'], // Store the date of birth
        'address' => $validated['address'], // Store the address
    ]);

    // Redirect back with success message
    return redirect()->route('employees.isndex')->with('success', 'Employee added successfully.');
}
    
}
