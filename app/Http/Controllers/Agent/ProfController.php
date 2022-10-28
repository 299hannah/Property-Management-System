<?php

namespace App\Http\Controllers\Agent;
use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
use App\Models\profagent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\File;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $profagent = profagent::where('agent_id',Auth::guard('agent')->user()->id)->first();
        if(!$profagent)
        {
            $profagent = new profagent();
            $profagent->agent_id = Auth::guard('agent')->user()->id;
            // $input = $request->all();
            // dd($request->all());

            $profagent->save();   
        }
        $agent=Agent::find(Auth::guard('agent')->user()->id);
        return view('agent.profile.profile',compact('agent'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $agent = profagent::where('agent_id',Auth::guard('agent')->user()->id)->first();
        // $agent = profagent::where('id',$id)->first();

        // return $post; for testing array
        return view('agent.profile.editprofile',compact('agent'));
        // $agent = $this->getagentByid($id);
        // return view('profile.edit',compact('$agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
            $this->validate($request,[
                'name' => ['string', 'max:50'],
                'email' => ['string'],
                // 'password' => ['string', 'min:8', 'confirmed'],
                'phone' => 'numeric',
    
            ]);
            $profagent = profagent::where('agent_id',Auth::guard('agent')->user()->id)->first();
            if(!$profagent)
            {
                $profagent = profagent::find('agent_id',Auth::guard('agent')->user()->id);
                // $profagent = profagent::find($id);

                   if ($request->hasfile('image')) {
                    $destination = unlink('images/profiles/' . $this->image);
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move('images/agent', $filename);
                    $profagent->image = $filename;
                    } 
                $profagent->name = $request->name;
                $profagent->email = $request->email;
                $profagent->phone = $request->phone;
                $profagent->agent_id = Auth::guard('agent')->user()->id;
                // $input = $request->all();
                dd($request->all());
    // 
                // $profagent->save();   
            }
            $agent=Agent::find(Auth::guard('agent')->user()->id); 
            return view('agent.profile.editprofile',compact('agent'));
       
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
