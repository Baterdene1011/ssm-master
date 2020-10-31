<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return redirect()->route('item');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => __('lang.require'),
            'password.required' => __('lang.require'),
        ]);

        $getToken = postRest('login', array(
            'email' => $request->email,
            'password' => $request->password,
        ));
        
        if ($getToken['status'] == 'success') {
            session(['authemail' => $request->email, 'authpassword' => $request->password]);
            return redirect()->route('item');
        } else {
            return redirect()->route('login')->with('error', __('lang.loginErrorMsg'));
        }
    }

    public function login()
    {
        $page_title = __('lang.login');

        return view('login.index', compact('page_title'));
    }        
}
