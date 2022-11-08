<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\post;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

 

class AdminTenantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $tenants = Tenant::all();
        return view('admin.tenants.index')->with('tenants', $tenants);
    }

    public function create()
    {
        $posts = post::all();
        return view('admin.tenants.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneno' => 'required|numeric',
            'houseno' => ['required', 'string'],
            'idno' => 'required|numeric', 'unique:admins',
        ]);
        $request['password'] = bcrypt($request->password);
        $tenant = new tenant;
        $tenant = tenant::create($request->all());
        $tenant->save();

        session()->flash('success', 'Added successfully');
        return redirect('admin/tenants');
    }
    public function show($id)    
    {
        $tenants = Tenant::find($id);
        $transactions = Transactions::all();
        // $transactions = Transactions::where('houseno', Auth::user()->houseno)->get();
        return view('admin.tenants.show', compact('tenants', 'transactions'));
    }

    public function edit($id)
    {
        $tenant = Tenant::find($id);

        $posts = post::all();

        return view('admin.tenants.edit', compact('tenant', 'posts' ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phoneno' => 'required|numeric',
            'houseno' => ['required', 'string'],
        ]);
        $request->status ?: $request['status'] = 0;
        $tenant = Tenant::where('id', $id)->update($request->except('_token', '_method', 'post'));
        Tenant::find($id)->posts()->sync($request->post);
        return redirect('admin/tenants')->with('message', 'tenant Updated!');
    }

    public function destroy($id)
    {
        Tenant::where('id', $id)->delete();
        return redirect('admin/tenants')->with('message', 'tenant deleted!');
    }
}