<?php

namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\Agent;
use App\Models\Category;
use App\Models\DamagedRoom;
use App\Models\VacantRoom;
use App\Models\Tenant;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent');
    }

    public function Index(){

        return view('agent.login');
    }

    public function AgentDashboard(){      
        // $agents = Agent::where('post_id', session('post_id')); 
        
        $users = User::whereHas('categories', function($query) {
            $query->where('name', 'categories');
        })->get(['name', 'id']);
        $tenants  = Tenant::where('post_id',optional(Auth::guard('agent')->user())->id)->count();
        $damagedrooms  = DamagedRoom::where('post_id',optional(Auth::guard('agent')->user())->id)->count();
        $vacantrooms  = VacantRoom::where('post_id',optional(Auth::guard('agent')->user())->id)->count();
        $rooms = $tenants + $damagedrooms + $vacantrooms ;

            return  view('agent.home',compact('tenants','rooms','damagedrooms','vacantrooms'));
        }
        
    public function AgentLogout(){
        Session::flush();
        Auth::guard('agent')->logout();
        return redirect()->route('agent.login')->with('error','Agent Logged out Successfully');
    }
}