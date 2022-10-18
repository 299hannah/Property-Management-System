<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;



class TenantsController extends Controller
{
    public function index()
    {
        // $transactions  = Transactions::where('post_id', optional(Auth::user())->id)->get();

        $transactions = Transactions::all();
        return view('tenant.index')->with('transactions', $transactions);

        // $transactions  = Transactions::where('post_id', optional(Auth::user())->id)->get();
        // $tenants = Tenant::find('post_id',optional(Auth::user())->id)->get(); 

    }

    public function create()
    
    {
        return view('transactions');
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
        return redirect('agent/transactions')->with('flash message', 'transaction Updated!');
    }

    public function destroy($id)
    {
        Transactions::destroy($id);
        return redirect('agent/transactions')->with('flash message', 'transaction deleted!');
    }
}
