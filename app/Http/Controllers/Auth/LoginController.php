<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        if (Auth()->user()->role == 1) {
            return route('adminDashboard');
        } elseif (Auth()->user()->role == 2) {
            return route('userDashboard');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password')))) {
            if (auth()->user()->role == 1) {
                return redirect()->route('adminDashboard')->with('success', 'Successfully logged In');
            } elseif (auth()->user()->role == 2) {
                return redirect()->route('userDashboard')->with('success', 'Successfully logged In');
            } else {
                return redirect()->route('login')->with('error', 'Incorrect Credentials');
            }
        }
    }

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
