<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
            if ( Auth::user()->role_id == 1 ) {
                return redirect()->route('ticket');
            } elseif ( Auth::user()->role_id == 2 ) {
                return redirect()->route('lm2.list');
            } elseif ( Auth::user()->role_id == 3 ) {
                return redirect()->route('hrbp.list');
            } elseif ( Auth::user()->role_id == 4 ) {
                return redirect()->route('hrt.dashboard');
            } else {
                dd('oke');
            }
            

        } else {
            return back()->with('error','Your Username or Password is Invalid!');
        }
    }

    public function logout() {
        Auth::logout();
        return view('auth.login');
    }
}
