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


        $sameBranchUsers = User::where('branch_id', $user_branch_id)
            ->when($searchedName, function ($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->paginate(5);

        $locationBranch = Branch::where('branch_id',$user_branch_id)->pluck('branch_name')->first();

        return view('manage-employees', compact('sameBranchUsers','locationBranch'));
    }

}
