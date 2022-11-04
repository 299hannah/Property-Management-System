<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Tenant;

use Illuminate\Support\Facades\Auth;

class TenantProfileController extends Controller
{
    public function index(){


    $tenantProf = Profile::where('tenant_id',Auth::user()->id)->first();

    if(!$tenantProf)
    {
        $profile = new Profile();
        $profile->tenant_id = Auth::user()->id;
        // $input = $request->all();
        $profile->save();
        
    }

            // $agents=Agent::find(Auth::guard('agent')->user()->id);
            // $tenantProfs=tenantProf::where('post_id','=', Auth::user())->get();
        $tenant=Tenant::find(Auth::user()->id);
        return view('agent.tenants.profile',compact('tenant'));
        // return view('/home',compact('tenant'));

    }
    
}












