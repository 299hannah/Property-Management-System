<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\category;
use App\Models\post;
use Illuminate\Auth\Authenticatable;


class AgentController extends Controller
{
          /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        // $agents = Agent::where('post_id', session('post_id')); 
        return  view('admin.agent.show',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $posts = post::all();

        // $roles = role::all(); return $roles;
        // $roles = role::all();
       return view('admin.agent.create', compact('categories','posts'));
    //    ,compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function generateUniqueCode()
    // {
    //     do {
    //         $code = random_int(100000, 999999);
    //     } while (Agent::where("post_id", "=", $code)->first());
    //     return $code;
    // }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => 'required|numeric',
            

        ]);
        
        // $request->post_id = random_int(100000, 999999);
        $request['password'] = bcrypt($request->password);
        $agent = new agent;
        
       
        // $agent->post_id()->sync($request->post_id);
        // $agent->post_id=$request->session()->get('post_id');
        $agent =Agent::create($request->all());
        // dd($request->all());
        $agent->save();
        // $agent->roles()->sync($request->role);
        // $agent ->categories()->sync($request->categories);
        // $agent ->posts()->sync($request->post);


        return redirect(route('agent.index'));
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent=Agent::find($id);
        // $posts = agent::with ('posts')->where('id',$id)->first();
        // $posts = post::find($post_id);

        // $roles = role::all();
        $categories = category::all();
        $posts = post::all();


        return view('admin.agent.edit',compact('categories','agent','posts'));
        // ,'roles'));
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => 'required|numeric',

        ]);


        $request->status? : $request['status']=0;
        $agent = agent::where('id',$id)->update($request->except('_token','_method','category','post'));
        // $user->categories()->sync($request->categories);
        Agent::find($id)->categories()->sync($request->category);
        Agent::find($id)->posts()->sync($request->post);

        return redirect(route('agent.index'))->with('message','agent updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::where('id',$id)->delete();
        return redirect()->back()->with('message','agent deleted successfully');
    }
}
