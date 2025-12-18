<?php

// app/Http/Controllers/SuperAdminController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('admin.superadmin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.superadmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => '1'
        ]);

        return redirect()->route('superadmin.index')->with('success', 'Admin created successfully');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.superadmin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $admin->update([
            'name' => $request->name,
            'email'    => $request->email,
        ]);

        return redirect()->route('superadmin.index')->with('success', 'Admin updated successfully');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('superadmin.index')->with('success', 'Admin deleted successfully');
    }
}
