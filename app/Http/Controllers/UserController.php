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
        //gets the searched employee
        $searchedName = $request->input('search');

        //gets allemployees  from the same branch as the admin
        $user_branch_id = Auth::user()->branch_id;
        $sameBranchUsers = User::where('branch_id', $user_branch_id)->paginate(5);

        //gets the branch of the admin
        $locationBranch = Branch::where('branch_id',$user_branch_id)->pluck('branch_name')->first();

        return view('manage-employees', compact('sameBranchUsers','locationBranch'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:11',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'national_insurance_number' => 'required|string|min:9',
        ]);

        //creates a new user based in the input details
        $user = new User([
            'name' => $validated['name'],
            'phonenumber' => $validated['phonenumber'],
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
        //gets the id of the branch of the admin
        $user_branch_id = Auth::user()->branch_id;

        //gets the searched employee if it is in the same branch as the admin
        $sameBranchUsers = User::where('branch_id', $user_branch_id)
            ->when($search, function ($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->paginate(5);

        //gets the name of branch of the admin
        $locationBranch = Branch::where('branch_id',$user_branch_id)->pluck('branch_name')->first();


        //displays all employees with a similar name as the searched one
        $results = User::where('name', 'like', "%$search%")->get();

        return view('manage-employees', compact('sameBranchUsers', 'locationBranch', 'search'));
    }

}
