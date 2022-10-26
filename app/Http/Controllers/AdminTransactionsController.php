<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;


class AdminTransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transactions::all();
        return view('admin.transactions.index')->with('transactions',$transactions);
    }
    public function show($id)
    {
        $transaction = Transactions::find($id);
        return view('admin.transactions.show')->with('transactions',$transaction);
    }
    public function edit($id)
    {
        $transaction = Transactions::find($id);
        return view('admin.transactions.edit')->with('transactions', $transaction);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transactions::find($id);
        $input = $request->all();
        $transaction->update($input);
        return redirect('admin/transactions')->with('flash message', 'transaction Updated!');
    }
}
