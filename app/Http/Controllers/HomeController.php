<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\post;
// use App\Models\User;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\DB;
use App\Models\category_user;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        
    $tenant = Tenant::where('post_id',optional(Auth::guard('web')->user())->id)->get(); 
    
        return view('/home',compact('tenant'));
    }
}

