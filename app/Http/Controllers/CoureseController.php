<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CoureseController extends Controller
{
      public function index()

    {
        $data = Course::all();
        return view('admin.course.index',compact('data'));
    }

    public function create()
    {
        return view('admin.course.create');
    }
public function store(Request $request)
{
    // Validation
    $request->validate([
        'name'        => 'required|string|max:255',
        'image'       => 'required|mimes:jpg,jpeg,png|max:2048',
        'duriation'   => 'required|string|max:1000',
        'description' => 'required|string|max:2000',
    ]);

    // File Upload
    $filePath = null;
    if ($request->hasFile('image')) {
        $filePath = $request->file('image')->store('courses', 'public');
    }

    // Save to DB
    Course::create([
        'name'        => $request->name,
        'image'       => $filePath,
        'duriation'   => $request->duriation,
        'description' => $request->description,
    ]);

    return redirect()->route('course.index')->with('success', 'Course added successfully!');
}


public function edit($id)
{
    // dd($id );
    $course = Course::findOrFail($id);
    return view('admin.course.edit', compact('course'));
}

public function update(Request $request, $id)
{
    $course = Course::findOrFail($id);


     $request->validate([
        'name'        => 'required|string|max:255',
        'image'       =>'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        'duriation'   => 'required|string|max:1000',
        'description' => 'required|string|max:2000',
    ]);



    $filePath = $course->image;

    if ($request->hasFile('image')) {

        if ($filePath && \Storage::disk('public')->exists($filePath)) {
            \Storage::disk('public')->delete($filePath);
        }

        $filePath = $request->file('image')->store('course', 'public');
    }

    $course->update([


         'name'        => $request->name,
        'image'       => $filePath,
        'duriation'   => $request->duriation,
        'description' => $request->description,


         ]);

    return redirect()->route('course.index')->with('success', 'Trainer updated successfully!');
}



public function destroy($id)
{
    // dd('delete' );

    $trainer = Course::findOrFail($id);

    // Delete uploaded file if exists
    if ($trainer->file_upload && \Storage::disk('public')->exists($trainer->file_upload)) {
        \Storage::disk('public')->delete($trainer->file_upload);
    }

    $trainer->delete();

    return redirect()->route('course.index')->with('success', 'Trainer deleted successfully');
}


}
