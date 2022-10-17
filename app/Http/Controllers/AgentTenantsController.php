<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\post;


use Illuminate\Support\Facades\Auth;

class AgentTenantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('agent');
    }

    public function index()
    {
  
    $tenants  = Tenant::where('post_id',optional(Auth::guard('agent')->user())->id)->get();

    // $tenants = Tenant::find('post_id',optional(Auth::user())->id)->get();    
    return view('agent.tenants.index',compact('tenants'));

}
    
    public function create()
    {
        $posts = post::all ();
        return view('agent.tenants.create', compact('posts'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneno' => 'required|numeric',
            'houseno' => ['required', 'string'],
            'idno' => 'required|numeric','unique:admins',

        ]);

        $request['password'] = bcrypt($request->password);
        $tenant = new tenant;
        $tenant =tenant::create($request->all());
        $tenant->save(); 

        $tenant ->posts()->sync($request->posts);
        session()->flash('success', 'Added successfully');
        // dd($request->all());
        return redirect('agent/tenants');

    }

    public function show($id)
    {
        $tenant = Tenant::find($id);
        return view('agent.tenants.show')->with('tenants',$tenant);
    }
    public function edit($id)
    {
        $tenant = Tenant::find($id);
        return view('agent.tenants.edit')->with('tenants', $tenant);
    }

    public function update(Request $request, $id)
    {
       
        $this->validate($request,[
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneno' => 'required|numeric',
            'houseno' => ['required', 'string'],
        ]);
        $request->status? : $request['status']=0;
        $tenant = Tenant::where('id',$id)->update($request->except('_token','_method','post'));
        Tenant::find($id)->posts()->sync($request->post);
    return redirect('admin/tenants')->with('message', 'tenant Updated!');
    }

    public function destroy($id)
    {
        Tenant::destroy($id);
        return redirect('agent/tenants')->with('flash message', 'tenant deleted!');
    }
}


// dd($request->all());