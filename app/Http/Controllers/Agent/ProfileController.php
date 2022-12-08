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
            $profagent->save();   
        }
        $agent=Agent::find(Auth::guard('agent')->user()->id);
        return view('agent.profile.profile',compact('agent'));
    }
}
