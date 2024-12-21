<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Branch;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index(Request $request)
    {

        $user_branch_id = Auth::user()->branch_id;
        $branch_id = User::where('branch_id', $user_branch_id)->pluck('id');

        $transactions = Transaction::whereIn('user_id',$branch_id);

        $dateFilter = $request->input('dateFilter','all');

        switch($dateFilter){
            case 'today':
                $transactions->whereDate('created_at',Carbon::today());
                break;
            case 'thisWeek':
                $transactions->whereBetween('created_at',[
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek(),
                ]);
                break;
            case 'thisMonth':
                $transactions->whereBetween('created_at', [
                    Carbon::now()->startOfMonth(),
                    Carbon::now()->endOfMonth(),
                ]);
                break;
            case 'thisYear':
                $transactions->whereBetween('created_at', [
                    Carbon::now()->startOfYear(),
                    Carbon::now()->endOfYear(),
                ]);
                break;
            default:
                break;

        }

        $transactions = $transactions->get();


        $groupedTransactions = $transactions->groupBy(function($transaction) {
            return $transaction->created_at->format('Y-m-d');
        });


        $chartTransaction = $groupedTransactions->toArray();
        $chartData[] = ["Day","Profit (£)"];
        foreach ($groupedTransactions as $key => $value){

            $chartData[] = [$key,$value->sum('price')];
        }

        $locationBranch = Branch::where('branch_id',$user_branch_id)->pluck('branch_name')->first();

        return view('generate-reports', compact('groupedTransactions','chartData','dateFilter','locationBranch'));

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
