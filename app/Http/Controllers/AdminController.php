<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_branch_id = Auth::user()->branch_id;
        $branch_id = User::where('branch_id', $user_branch_id)->pluck('id');
        $transactions = Transaction::whereIn('user_id',$branch_id)->get();


        $groupedTransactions = $transactions->groupBy(function($transaction) {
            return $transaction->created_at->format('Y-m-d');
        });


        return view('generate-reports', compact('groupedTransactions'));

    }

    public function generate()
    {
        $user_branch_id = Auth::user()->branch_id;
        $branch_id = User::where('branch_id', $user_branch_id)->pluck('id');
        $transactions = Transaction::whereIn('user_id',$branch_id)->get();


        $groupedTransactions = $transactions->groupBy(function($transaction) {
            return $transaction->created_at->format('Y-m-d');
        });



        return view('generate-reports', compact('groupedTransactions'));
    }

    public function manage()
    {
        $users = Transaction::with('users')->get();
        return view('manage-employees')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
