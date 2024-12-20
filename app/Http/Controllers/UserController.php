<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Branch;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchedName = $request->input('search');
        $user_branch_id = Auth::user()->branch_id;
        $sameBranchUsers = User::where('branch_id', $user_branch_id)->paginate(5);

        $locationBranch = Branch::where('branch_id',$user_branch_id)->pluck('branch_name')->first();

        return view('manage-employees', compact('sameBranchUsers','locationBranch'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\d{3}-\d{2}-\d{3}$/',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'national_insurance_number' => 'required|string|min:9',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'dob' => $validated['dob'],
            'address' => $validated['address'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'national_insurance_number' => $validated['national_insurance_number'],
            'branch_id' => Auth::user()->branch_id,
            'admin' => '0',
        ]);
        $user->save();


        return to_route('manage-employees');
    }


    public function search(Request $request){
        $search = $request->input('search');

        $user_branch_id = Auth::user()->branch_id;
        $sameBranchUsers = User::where('branch_id', $user_branch_id)
            ->when($search, function ($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->paginate(5);


        $locationBranch = Branch::where('branch_id',$user_branch_id)->pluck('branch_name')->first();



        $results = User::where('name', 'like', "%$search%")->get();

        return view('manage-employees', compact('sameBranchUsers', 'locationBranch', 'search'));
    }

}
