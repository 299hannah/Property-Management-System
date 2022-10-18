<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\Agent;
use App\Models\post;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function Index()
    {
        return view('admin.admin_login');
    }

    public function Dashboard()
    {
        $tenants = Tenant::count();
        $agents = Agent::count();
        $posts = post::count();
        return view('admin.home', compact('tenants','agents','posts'));
    }
    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('error','Admin Logged out Successfully');
    }

    public function AdminRegister()
    {
        return view('admin.admin_register');
    }

    public function AdminRegisterCreate(Request $request)
    {
        $input  = request()->except(['_token', '_method']);
        $request->validate([

            'name' => 'required|max:25',

            'email' => 'required|between:3,64|email|unique:admins',

            'password' => 'required|min:6|max:20|confirmed',

            'created_at' => Carbon::now(),

        ]);

        $input['password'] = bcrypt($input['password']);
        $input['password_confirmation'] = bcrypt($input['password_confirmation']);

        Admin::insert($input);

        return redirect()->route('admin.login')->with('success', 'Admin created Successfully');
    }
}
