<?php

namespace App\Http\Controllers;
use App\Models\College;
use App\Models\Student;
use App\Models\Course;
use App\Models\Department;
use App\Models\Section;
use App\Models\Year;
use App\Models\Trainer;
use App\Models\Allocate;

use Illuminate\Http\Request;

class AllocateController extends Controller
{
    //
      public function index()
    {
        $data = Allocate::with(['college', 'course','department','year','trainer'])->get();
        // dd($data);
        return view('admin.allocate.index',compact('data'));
    }

    public function create()
    {
        $college = College::all();
        $courses = Course::all();
        $department = Department::all();
        $year = Year::all();
        $section = Section::all();
        $trainer = Trainer::all();
        // dd($trainer);
        return view('admin.allocate.create',compact('courses','college','department','year','section','trainer'));
    }

    public function getBatches($college_id)
{
    $batches = Student::where('college_id', $college_id)
                ->select('batch_number')
                ->distinct()
                ->get();

    return response()->json($batches);
}


public function getBatchInfo($batch)
{
    $student = Student::where('batch_number', $batch)->first();

  return response()->json([
    'department_id' => $student->department_id,
    'year_id'       => $student->year_id,
    'section_id'    => $student->section_id,

    'department_name' => $student->department->name,
    'year_name'       => $student->year->name,
    'section_name'    => $student->section->name,
    'batch_name' => $student->batch_number
]);

}


   public function store(Request $request)
{
    // dd($request);
    $request->validate([
        'college_id'     => 'required|exists:college,id',
        'course_id'      => 'required|exists:courses,id',
        'department_id'  => 'required|exists:departments,id',
        'year_id'        => 'required|exists:year,id',
        'section_id'     => 'required|exists:section,id',
        'trainer_id'     => 'required|exists:trainers,id',

        'from_date'      => 'required|date',
        'to_date'        => 'required|date|after_or_equal:from_date',

        'description'    => 'nullable|string',

        // If you add name, email, contact_number later — include them here
    ]);


    Allocate::create([
        'college_id'    => $request->college_id,
        'course_id'     => $request->course_id,
        'department_id' => $request->department_id,
        'year_id'       => $request->year_id,
        'section_id'    => $request->section_id,
        'trainer_id'    => $request->trainer_id,
        'from_date'     => $request->from_date,
        'to_date'       => $request->to_date,
        'description'   => $request->description,
        'batch_name'    => $request->batch_name,

    ]);


    return redirect()->route('allocate.index')
                     ->with('message', 'Student details added successfully!')->with('type', 'success');
}


public function edit($id)
{
    $allocate = Allocate::findOrFail($id);

    $college = College::all();
    $courses = Course::all();
    $department = Department::all();
    $year = Year::all();
    $section = Section::all();
    $trainer = Trainer::all();

    return view('admin.allocate.edit', compact(
        'allocate',
        'college',
        'courses',
        'department',
        'year',
        'section',
        'trainer'
    ));
}

public function update(Request $request, $id)
{
    $request->validate([
        'college_id' => 'required',
        'course_id' => 'required',
        'department_id' => 'required',
        'year_id' => 'required',
        'section_id' => 'required',
        'trainer_id' => 'required',
        'from_date' => 'required|date',
        'to_date' => 'required|date|after_or_equal:from_date',
        'description' => 'nullable|string',
    ]);

    $allocate = Allocate::findOrFail($id);

    $allocate->update([
        'college_id' => $request->college_id,
        'course_id' => $request->course_id,
        'department_id' => $request->department_id,
        'year_id' => $request->year_id,
        'section_id' => $request->section_id,
        'trainer_id' => $request->trainer_id,
        'from_date' => $request->from_date,
        'to_date' => $request->to_date,
        'description' => $request->description,
    ]);

    return redirect()->route('allocate.index')
                     ->with('message', 'Allocate details updated successfully!')->with('type', 'warning');
}



public function destroy($id)
{
    // dd('delete' );

    $student = Allocate::findOrFail($id);

    // Delete uploaded file if exists
    if ($student->file_upload && \Storage::disk('public')->exists($student->file_upload)) {
        \Storage::disk('public')->delete($student->file_upload);
    }

    $student->delete();

    return redirect()->route('student.index')->with('message', 'Trainer deleted successfully')->with('type', 'danger');
}
}
