<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
      public function login(Request $request)
    {    
        $redirectTo =$request->only('email', 'password');
        if(Auth::attempt($redirectTo)){
            if(Auth::user()->role == 'admin'){
                return to_route('admin.dashboard');
            }
           
            elseif(Auth::user()->role == 'manager'){

                return to_route('manager.dashboard');
            }
            else{
                return view('home');
            }
        }
 
    }
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();
        
    //     $url = "";
    //     if($request->user()->role === "admin"){
    //         $url = "admin/dashboard";
    //     }elseif($request->user()->role === "agent"){
    //         $url = "agent/dashboard";
    //     }else{
    //         $url = "dashboard";  
    //     }

    //     return redirect()->intended($url);
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
