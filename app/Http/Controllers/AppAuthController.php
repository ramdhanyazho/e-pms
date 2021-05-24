<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AppAuthController extends Controller
{
	public function __construct() {}

	public function login() {
        if (Auth::check()) {
            return redirect('/');
        }
        
		return view('authentications.login');
	}

    public function doLogin(Request $request) {
        $credentials = $request->only('nik', 'password');
        $credentials['nik'] = strtoupper($request->get('nik'));

        if (Auth::attempt($credentials)) {
            // Authentication passed...            
            $this->recordActivity('is <strong>login</strong>.');
            if (Auth::user()->acl_assigned_id == 300) {
                return redirect()->intended('od/dashboard');
            }
            return redirect()->intended('em/dashboard');
        } else {
            $this->recordActivity($credentials['nik'] . ' is <strong>failed to login</strong>.');
            return redirect('login')->with('message', 'Login Anda gagal. NIK atau password salah.');
        }
    }

    public function doLogout() {
        $this->recordActivity('is <strong>logging out</strong>.');
        Auth::logout();
        return redirect('/login');
    }

}
