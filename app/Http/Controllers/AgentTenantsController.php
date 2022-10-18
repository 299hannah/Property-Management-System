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
        // $tenants = Tenant::where('post_id', session('post_id')); 

    // $tenants  = Tenant::where('post_id',Auth::guard('agent')->user()->id)->get();
    $tenants = Tenant::where('post_id',optional(Auth::guard('agent')->user())->id)->get();    

    // $tenants = Tenant::where('post_id',optional(Auth::user())->id)->get();    
    return view('agent.tenants.index',compact('tenants'));
    }
    public function create()
    {
        $posts = post::all();
        return view('agent.tenants.create', compact('posts'));

    }
    public function store(Request $request)
    {   
        $this->validate($request,[
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneno' => 'required|numeric',
            'houseno' => ['required', 'string'],
            'idno' => 'required|numeric',
        ]);
        $request['password'] = bcrypt($request->password);
        $tenant = new tenant;
        $tenant =tenant::create($request->all());
        // dd($request->all());
        $tenant ->posts()->sync($request->posts);
        $tenant ->houseno()->sync($request->houseno);

        // $agents = Agent::where('post_id', session('post_id')); 

        $tenant->save(); 
        session()->flash('success', 'Added successfully');
        return redirect('agent/tenants');
    }
    public function show($id )
    {
     
 
        // $tenants = DB::table('transactions')
        //             ->join('tenants', 'transactions.houseno', '=', 'tenants.houseno')
        //             ->where('transactions.houseno', '=', 'tenants.houseno')
        //             ->select(['transactions.houseno',
        //             'tenants.houseno'])
        //             ->first($id);


        // $tenants  = transactions::where('houseno',optional(Auth::guard('agent')->user())->id)->find($id);
        // $transactions  = Transactions::where('houseno',optional(Auth::guard('agent')->user())->houseno)->first($id); 

        // $tenants  = Tenant::where('houseno',Auth::guard('agent')->user()->id)->find($id);
        // $transactions = Transactions::where('houseno')->first();     

        // $transactions = Transactions::find('houseno');
        // $posts = post::all();
        $tenants = Tenant::find($id);
        // dd($transactions);
        return view('agent.tenants.show', compact('tenants'));
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
    return redirect('agent/tenants')->with('message', 'tenant Updated!');
    }

    public function destroy($id)
    {
        Tenant::destroy($id);
        return redirect('agent/tenants')->with('flash message', 'tenant deleted!');
    }
}

