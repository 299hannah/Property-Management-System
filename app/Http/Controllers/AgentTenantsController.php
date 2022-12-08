<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\post;
use App\Models\Transactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AgentTenantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent');
    }
    public function index()
    {
    $tenants = Tenant::where('post_id',optional(Auth::guard('agent')->user())->id)->get(); 
    return view('agent.tenants.index' , compact('tenants'));
    }
    public function create()
    {
        $posts = post::all();
        return view('agent.tenants.create',compact('posts'));
    }
    public function store(Request $request)
    {  
        $agent = DB::table('agents')->where('post_id', Auth::user()->post_id)->get();
        $this->validate($request,[
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneno' => 'required|numeric',
            'houseno' => ['required', 'string'],
            'idno' => 'required|numeric',
            'post_id' => 'required|exists:posts,id',
        ]);
        $request['post_id'] = $agent;
        $request['password'] = bcrypt($request->password);
        $tenant = new tenant;
        $tenant =tenant::create($request->all());
        dd($request->all());
        $tenant ->posts()->sync($request->posts);    
        // $tenant->save(); 
         session()->flash('success', 'Added successfully');
        return redirect('agent/tenants');
    }
    public function show($houseno)
    {
    $tenants = Tenant::find($houseno);
    // $transactions = DB::table('transactions')->where('houseno', Auth::user()->houseno)->get();
    $transactions = Transactions::all();
    return view('agent.tenants.show', compact('tenants','transactions'));
    }
    public function edit($id)
    {
        $tenants = Tenant::find($id);
        $posts = post::all();
        return view('agent.tenants.edit', compact('tenants','posts'));
    }
    public function update(Request $request, $id)
    {  
        $this->validate($request,[
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phoneno' => 'required|numeric',
            'houseno' => ['required', 'string'],
        ]);
        $request->status? : $request['status']=0;
        $tenant = Tenant::where('id',$id)->update($request->except('_token','_method','post'));
        Tenant::find($id)->posts()->sync($request->post);
    // return redirect('agent/tenants')->with('message', 'tenant Updated!');
    session()->flash('success', 'Updated successfully');
    return redirect('agent/tenants');
    }

    public function destroy($id)
    {
        Tenant::destroy($id);
        return redirect('agent/tenants')->with('flash message', 'tenant deleted!');
    }
}

