<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentAuthController extends Controller
{
    public function index()
    {
        return view('agent.home');
    }

    public function login()
    {
        return view('agent.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::attempt($req->only(['email', 'password']))) 
        {
            return redirect()->route('agent.home');
        }
        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('agent.login');
    }
}
