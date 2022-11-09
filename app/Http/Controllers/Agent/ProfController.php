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
        return view('agent.profile.index',compact('agent'));
    }
    public function edit($id)
    {
        $agent = profagent::where('agent_id',Auth::guard('agent')->user()->id)->first();
        return view('agent.profile.editprofile',compact('agent'));
    }
    public function update(Request $request)
    {
            $this->validate($request,[
                'name' => ['string', 'max:50'],
                'email' => ['string'],
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
                $input = $request->all();
                // dd($request->all());
                $profagent->save();   
            }
            session()->flash('success', 'Payment successfully');
            $agent=Agent::find(Auth::guard('agent')->user()->id); 
            return view('agent.profile.index',compact('agent'));   
    }
    public function destroy($id)
    {
        
    }
}