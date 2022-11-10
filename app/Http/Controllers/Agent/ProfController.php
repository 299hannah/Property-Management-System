<?php

namespace App\Http\Controllers\Agent;
use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
// use App\Models\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\File;
class ProfController extends Controller
{
    public function index(){
        $profagent = Agent::where('post_id',Auth::guard('agent')->user()->id)->first();
        if(!$profagent)
        {
            $Agent = new Agent();
            $Agent->post_id = Auth::guard('agent')->user()->id;
            // $input = $request->all();
            // dd($request->all());
            $Agent->save();   
        }
        $agent=Agent::find(Auth::guard('agent')->user()->id);
        return view('agent.profile.index',compact('agent'));
    }
    public function edit($id)
    {
        $agent = Agent::where('post_id',Auth::guard('agent')->user()->id)->first();
        return view('agent.profile.editprofile',compact('agent'));
    }
    public function update(Request $request)
    {
            $this->validate($request,[
                'name' => ['string', 'max:50'],
                'email' => ['string'],
                'phone' => 'numeric',
            ]);
            $Agent = Agent::where('post_id',Auth::guard('agent')->user()->id)->first();
            if(!$Agent)
            {
                $Agent = Agent::find('post_id',Auth::guard('agent')->user()->id);
                // $Agent = Agent::find($id);
                   if ($request->hasfile('image')) {
                    $destination = unlink('images/profiles/' . $this->image);
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move('images/agent', $filename);
                    $Agent->image = $filename;
                    } 
                // $Agent->name = $request->name;
                // $Agent->email = $request->email;
                // $Agent->phone = $request->phone;
                // $Agent->post_id = Auth::guard('agent')->user()->id;
                $input = $request->all();
                // dd($request->all());
                $Agent->save();   
            }
            session()->flash('success', 'Profile Updated successfully');
            $agent=Agent::find(Auth::guard('agent')->user()->id); 
            return view('agent.profile.index',compact('agent'));   
    }
    public function destroy($id)
    {
        
    }
}