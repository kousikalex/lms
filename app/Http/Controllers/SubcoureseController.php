<?php

namespace App\Http\Controllers;
use App\Models\SubCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class subcoureseController extends Controller
{
      public function index()
    {
        $data = Subcourse::with('course')->get();
        return view('admin.subcourse.index',compact('data'));
    }

    public function create()
    {
         $courses = Course::all();
        return view('admin.subcourse.create',compact('courses'));
    }
public function store(Request $request)
{
  $request->validate([
        'course_id'   => 'required|exists:courses,id',
        'name'        => 'required|string|max:255',
        'image'       => 'required|mimes:jpg,jpeg,png|max:2048',
        'description' => 'required|string|max:2000',
    ]);

    // File Upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('subcourses', 'public');
    }

    // Insert into DB
    Subcourse::create([
        'course_id'   => $request->course_id,
        'name'        => $request->name,
        'image'       => $imagePath,
        'description' => $request->description,
    ]);

    return redirect()->route('subcourse.index')->with('message', 'Sub-Course added successfully!')->with('type', 'success');
}

public function edit($id)
{
    // dd($id );
    $subcourse = Subcourse::findOrFail($id);
    $courses = Course::all(); // dropdown
    return view('admin.subcourse.edit', compact('subcourse', 'courses'));
}

public function update(Request $request, $id)
{
     $subcourse = Subcourse::findOrFail($id);

    // Validation
    $request->validate([
        'course_id'   => 'required|exists:courses,id',
        'name'        => 'required|string|max:255',
        'image'       => 'nullable|mimes:jpg,jpeg,png|max:2048',
        'description' => 'required|string|max:2000',
    ]);

    // File upload
    $imagePath = $subcourse->image;

    if ($request->hasFile('image')) {

        // delete old file if exists
        if ($subcourse->image && \Storage::disk('public')->exists($subcourse->image)) {
            \Storage::disk('public')->delete($subcourse->image);
        }

        // upload new file
        $imagePath = $request->file('image')->store('subcourses', 'public');
    }

    // Update DB
    $subcourse->update([
        'course_id'   => $request->course_id,
        'name'        => $request->name,
        'image'       => $imagePath,
        'description' => $request->description,
    ]);
    return redirect()->route('course.index')->with('message', 'Trainer updated successfully!')->with('type', 'warning');
}



public function destroy($id)
{
    // dd('delete' );

    $subcourse = Subcourse::findOrFail($id);

    // Delete uploaded file if exists
    if ($subcourse->file_upload && \Storage::disk('public')->exists($subcourse->file_upload)) {
        \Storage::disk('public')->delete($subcourse->file_upload);
    }

    $subcourse->delete();

    return redirect()->route('course.index')->with('message', 'Trainer deleted successfully')->with('type', 'danger');
}

public function uploadPdf(Request $request, $id)
{
    $request->validate([
        'pdf' => 'required|mimes:pdf|max:5120', // 5MB
    ]);

    $subcourse = Subcourse::findOrFail($id);

    // Delete old PDF if exists
    if ($subcourse->pdf && Storage::disk('public')->exists('subcourse_pdfs/' . $subcourse->pdf)) {
        Storage::disk('public')->delete('subcourse_pdfs/' . $subcourse->pdf);
    }

    $file = $request->file('pdf');

    // ✅ Keep original PDF name (safe version)
    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    $extension = $file->getClientOriginalExtension();

    $fileName = $originalName . '_' . time() . '.' . $extension;

    // Store in storage/app/public/subcourse_pdfs
    $file->storeAs('subcourse_pdfs', $fileName, 'public');

    // Save PDF name in DB
    $subcourse->update([
        'pdf' => $fileName,
    ]);

    return back()->with([
        'message' => 'PDF uploaded successfully',
        'type' => 'success'
    ]);
}


}
