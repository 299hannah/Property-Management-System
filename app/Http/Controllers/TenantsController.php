<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;



class TenantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent');
    }
    public function index()
    {
        $transactions = Transactions::where('post_id', optional(Auth::user())->id)->get();
        // $transactions = Transactions::all();
        return view('tenant.index')->with('transactions', $transactions);
    }
    public function create()
    
    {
        return view('transactions');
    }
    
    public function transact()
    {
        $transactions = Transactions::all();
        return view('home', compact('transactions'));

    }

    public function store(Request $request)
    {
        $input = $request->all();
        Transactions::create($input);
        session()->flash('success', 'Payment successfull');
        return redirect('home');
    }

    public function show($id)
    {
        $transaction = Transactions::find($id);
        return view('agent.transactions.show')->with('transactions', $transaction);
    }

    public function edit($id)
    {
        $transaction = Transactions::find($id);
        return view('agent.transactions.edit')->with('transactions', $transaction);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transactions::find($id);
        $input = $request->all();
        $transaction->update($input);
        session()->flash('Updated Successfully');
        return redirect('agent/transactions');
    }

    public function destroy($id)
    {
        Transactions::destroy($id);
        return redirect('agent/transactions')->with('flash message', 'transaction deleted!');
    }
}