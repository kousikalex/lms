<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.trainer.index');
    }

    public function create()
    {
        return view('admin.trainer.create');
    }
}
