<?php

namespace App\Http\Controllers\Agent;
use App\Models\profagent;
use App\Models\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $profagent = profagent::where('agent_id',Auth::guard('agent')->user()->id)->first();
        if(!$profagent)
        {
            $profagent = new profagent();
            $profagent->agent_id = Auth::guard('agent')->user()->id;
            // $input = $request->all();
            $profagent->save();   
        }
        $agent=Agent::find(Auth::guard('agent')->user()->id);
        return view('agent.profile',compact('agent'));
    }
}
