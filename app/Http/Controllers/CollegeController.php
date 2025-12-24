<?php

namespace App\Http\Controllers;
use App\Models\College;

use Illuminate\Http\Request;

class CollegeController extends Controller
{
    //
      public function index()
    {
        $data = College::all();
        return view('admin.college.index',compact('data'));
    }

    public function create()
    {
        return view('admin.college.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'collegename'      => 'required|string|max:255',
            'Logo'             => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'contact_person'   => 'required|string|max:255',
            'contact_number'   => 'required|string|max:20',
            'address'          => 'required|string|max:255',
            'landmark'         => 'nullable|string|max:255',
            'district'         => 'required|string|max:255',
            'state'            => 'required|string|max:255',
            'description'      => 'required|string|max:2000',
        ]);

        // File Upload
        $filePath = null;
        if ($request->hasFile('Logo')) {
            $filePath = $request->file('Logo')->store('college', 'public');
        }

        // Insert into DB
        College::create([
            'collegename'      => $request->collegename,
            'Logo'             => $filePath,
            'contact_person'   => $request->contact_person,
            'contact_number'   => $request->contact_number,
            'address'          => $request->address,
            'landmark'         => $request->landmark,
            'district'         => $request->district,
            'state'            => $request->state,
            'description'      => $request->description,
        ]);

        return redirect()->route('college.index')->with('message', 'College added successfully!')->with('type', 'success');
    }


public function edit($id)
{
    // dd($id );
    $college = College::findOrFail($id);

    return view('admin.college.edit', compact('college'));
}
public function update(Request $request, $id)
{
    $college = College::findOrFail($id);

    // Validation
    $request->validate([
        'collegename'      => 'required|string|max:255',
        'Logo'             => 'nullable|mimes:jpg,jpeg,png|max:2048',
        'contact_person'   => 'required|string|max:255',
        'contact_number'   => 'required|string|max:20',
        'address'          => 'required|string|max:255',
        'landmark'         => 'nullable|string|max:255',
        'district'         => 'required|string|max:255',
        'state'            => 'required|string|max:255',
        'description'      => 'required|string|max:2000',
    ]);

    // Handle new file upload
    $filePath = $college->Logo;
    if ($request->hasFile('Logo')) {

        // Delete old file if exists
        if ($college->Logo && \Storage::disk('public')->exists($college->Logo)) {
            \Storage::disk('public')->delete($college->Logo);
        }

        $filePath = $request->file('Logo')->store('college', 'public');
    }

    // Update DB
    $college->update([
        'collegename'      => $request->collegename,
        'Logo'             => $filePath,
        'contact_person'   => $request->contact_person,
        'contact_number'   => $request->contact_number,
        'address'          => $request->address,
        'landmark'         => $request->landmark,
        'district'         => $request->district,
        'state'            => $request->state,
        'description'      => $request->description,
    ]);

    return redirect()->route('college.index')->with('message', 'College updated successfully!')->with('type', 'warning');
}



public function destroy($id)
{
    // dd('delete' );

    $College = College::findOrFail($id);

    // Delete uploaded file if exists
    if ($College->file_upload && \Storage::disk('public')->exists($College->file_upload)) {
        \Storage::disk('public')->delete($College->file_upload);
    }

    $College->delete();

    return redirect()->route('course.index')->with('message', 'Trainer deleted successfully')->with('type', 'danger');
}
}
