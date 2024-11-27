<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();

        $groupedTransactions = $transactions->groupBy(function($transaction) {
            return $transaction->created_at->format('Y-m-d');
        });

        return view('generate-reports', compact('groupedTransactions'));

    }

    public function generate()
    {
        $transactions = Transaction::all();
        //$transactions = $transactions->groupBy('created_at');
        return view('generate-reports')->with('transaction',$transactions);
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
