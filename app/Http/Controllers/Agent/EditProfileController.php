<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
use App\Models\profagent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\File;

class EditProfileController extends Controller
{
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => ['string', 'max:50'],
            'email' => ['string'],
            // 'password' => ['string', 'min:8', 'confirmed'],
            'phone' => 'numeric',

        ]);
        $agent=Agent::find(Auth::guard('agent')->user()->id); 
        $agent->name = $agent->name;
        // dd($request->all());
        // $agent->save(); 
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
                $profagent->email = $request->email;
                $profagent->phone = $request->phone;
             
            // $profagent->save();   
        }
        // $agent->agent_id = Auth::guard('agent')->user()->id;
        // $input = $request->all();
        dd($request->all());
        // $agent->save(); 

       
        // return view('agent.editile',compact('agent'));
        return view('agent.profile.editprofile',compact('agent'));

   

    }
}
