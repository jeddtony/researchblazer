<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest:admin');
    }

    //
    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // if successful login, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessful, redirect back with to the login form
        return back()->withInput($request->only('email', 'remember'));
    }
}
