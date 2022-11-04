<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\category_user;
use App\Models\category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function showLoginForm()
    // {
    //     return view('user.login');
    // }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
             // Session::get('email', $user->category);
            //  $data = $request->input();
            //  $id = DB::table('agents')->where('email', $data['email'])->first()->post_id;
            //  session(['post_id' => $id]);
          
            // dd($id);

            return $this->sendLoginResponse($request);
        }
        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        //     $user2 = 
        //     DB::table('users')->where('users.id','all')
        //   ->join('categories', 'categories.id', '=', 'users.id')->get(['categories.name','users.name',]);

        // $user2 = Category::whereNull('category_id')
        // ->whereHas('users', function ($query) {
        //     $query->where('id', auth()->user()->id);
        // })
        // ->with([
        //     'categories', 
        //     'users' => function ($query) {
        //         $query->where('id', auth()->user()->id);
        //     }
        // ])
        // ->withCount('categories')
        // ->get();
        
       
        // User::find($id)->categories()->sync($request->category);

        // $user2 = User::join('users', 'users.id', '=', 'categories.id')
        //     ->join('category_users', 'category_users.user_id', '=', 'users.id')
        //     ->get(['categories.name', 'users.name',]);

        // $user2 = User::join('users','users.id','=','category_users.user_id')
        // ->join('category_users', 'category_users.user_id', '=', 'users.id')
        // ->get(['users.id']);


        // $user2 = User::where('email',$request->categories)->first()->category_id;

        // $user2 = User::where('email',$request->email)->first()->category_id;
        // $user2 = category::where('id',$request->get(array('id')))->first();
        $tenant = Tenant::where('email', $request->email)->first();
        if (count((array)$tenant)) {

            if ($tenant->status == 1) {

                return ['email' => 'inactive', 'password' => 'you are not activated please contact admin'];
            } else {
                // $req->session()->put('email',$data['category_id']);
                // Session::has('email', $user2);
                //  Session::put('email', $user);
                // Session::put('post', $user->post);

                
                // $user = $request->user(); 
                // $id = $request->user()->id; .
           

                // Session::put('category_id', $variable);
                // Session::get('email', $user->category);
                // $request->authenticate();
                // $data = $request->input();
                return ['email' => $request->email, 'password' => $request->password, 'status' => 3];
             

            }
        
        }
        // if(session()->has('category_id')){
        //     // session()->get('category_id');
        //     echo $request->session()->get('category_id');
        // }
    //    $var= $user->categories()->sync($request->categories)->category_id;

    //              Session::put('email', $var);
   
        return $request->only($this->username(), 'password');
    }


    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }


    protected function guard()
    {
        return Auth::guard('web');
    }
}