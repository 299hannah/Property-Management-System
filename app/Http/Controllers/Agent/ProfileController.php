<?php

namespace App\Http\Controllers\Agent;
use App\Models\profagent;
use App\Models\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\File;

class ProfileController extends Controller
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
        return view('agent.profile.profile',compact('agent'));
    }
    // public function update(Request $request, $id)
    // {
        
    //         $this->validate($request,[
    //             'name' => ['string', 'max:50'],
    //             'email' => ['string'],
    //             // 'password' => ['string', 'min:8', 'confirmed'],
    //             'phone' => 'numeric',
    
    //         ]);
    //         $profagent = profagent::where('agent_id',Auth::guard('agent')->user()->id)->first();
    //         if(!$profagent)
    //         {
    //             $profagent = profagent::find($id);
    //                if ($request->hasfile('image')) {
    //                 $destination = unlink('images/profiles/' . $this->image);
    //                 if (File::exists($destination)) {
    //                     File::delete($destination);
    //                 }
    //                 $file = $request->file('image');
    //                 $filename = time() . '.' . $file->getClientOriginalExtension();
    //                 $file->move('images/agent', $filename);
    //                 $profagent->image = $filename;
    //                 } 
    //             $profagent->name = $request->name;
    //             $profagent->email = $request->email;
    //             $profagent->phone = $request->phone;
    //             $profagent->agent_id = Auth::guard('agent')->user()->id;
    //             // $input = $request->all();
    //             // dd($request->all());
    
    //             $profagent->save();   
    //         }
    //         $agent=Agent::find(Auth::guard('agent')->user()->id); 
    //         return view('agent.profile.profile',compact('agent'));
       
    
        
    // }
}
