<?php

// app/Http/Controllers/SuperAdminController.php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.superadmin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.superadmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin'
        ]);

        return redirect()->route('superadmin.index')->with('success', 'Admin created successfully');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.superadmin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update([
            'username' => $request->username,
            'email'    => $request->email,
        ]);

        return redirect()->route('superadmin.index')->with('success', 'Admin updated successfully');
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('superadmin.index')->with('success', 'Admin deleted successfully');
    }
}
