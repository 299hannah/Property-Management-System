<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\post;
use Illuminate\Support\Facades\Auth;

class AgentTransactionsController extends Controller
{
    public function __construct()
    {
      $this->middleware('agent');
    }
    public function index()
    {  
        $transactions = Transactions::where('post_id',optional(Auth::guard('agent')->user())->id)->get();
        return view('agent.transactions.index',compact('transactions')); 
    }
    public function create()
    {   
        return view('agent.transactions.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Transactions::create($input);
        // dd($request->all());
        session()->flash('success', 'Payment successfully');
        return redirect('agent/transactions');
    }
    public function show($id)
    {
        $transaction = Transactions::find($id);
        return view('agent.transactions.show')->with('transactions', $transaction);
    }
    public function edit($id)
    {
        $transaction = Transactions::find($id);
        // $months = Transactions::pluck('January','February','March','April','May','June','July','August','September','October','November','December');
        return view('agent.transactions.edit', compact('transaction'));
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
