<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.superadmin.login');
    }

  public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();
        $user = Auth::user();

        // 🔐 ROLE BASED REDIRECT (FROM DB)
        if ($user->role == 0) {
            return redirect()->route('superadmin.index');
        }

        if ($user->role == 1) {
            return redirect()->route('dashboard');
        }

        // fallback
        Auth::logout();
        return back()->withErrors([
            'email' => 'Unauthorized role access',
        ]);
    }

    return back()->withErrors([
        'email' => 'Invalid email or password',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
