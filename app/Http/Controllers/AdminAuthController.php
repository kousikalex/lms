<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.superadmin.login'); // reuse same UI
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {

            $user = Auth::guard('admin')->user();

            // 🔐 ROLE BASED REDIRECT
            if ($user->role === 'superadmin') {
                return redirect()->route('superadmin.index');
            }

            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
