<?php

namespace App\Http\Controllers;
use App\Models\College;
use App\Models\Student;
use App\Models\Course;
use App\Models\Department;
use App\Models\Section;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
      public function index()
    {
        $data = Student::with(['college', 'course','department','year'])->get();

        return view('admin.student.index',compact('data'));
    }

    public function create()
    {
        $college = College::all();
        $courses = Course::all();
        $department = Department::all();
        $year = Year::all();
        $section = Section::all();
        // dd($section);
        return view('admin.student.create',compact('courses','college','department','year','section'));
    }

   public function store(Request $request)
{
    // dd($request);
    $request->validate([
        'college_id'    => 'required|exists:college,id',
        'course_id'     => 'required|exists:courses,id',
        'department_id'     => 'required|exists:departments,id',
        'year_id'     => 'required|exists:year,id',
        'section_id'     => 'required|exists:section,id',
        'students_file' => 'required|file|mimes:xlsx,xls,csv',
    ]);
    $college = College::find($request->college_id);
    $department = Department::find($request->department_id);
    $year = Year::find($request->year_id);

    // remove spaces + make lowercase (college code)
    $collegeName = preg_replace('/\s+/', '', strtolower($college->collegename));
    $departmentName = preg_replace('/\s+/', '', strtolower($department->name));
    $yearName = preg_replace('/\s+/', '', strtolower($year->name));

    // 🔥 Find last batch for SAME college + department + year
    $lastRecord = Student::where('college_id', $request->college_id)
        ->where('department_id', $request->department_id)
        ->where('year_id', $request->year_id)
        ->orderBy('batch_number', 'DESC')
        ->first();

    // 🔥 Increase batch count automatically
    $batchNumber = $lastRecord ? $lastRecord->batch_number + 1 : 1;

    // 🔥 Generate the new batch code
    $batchCode = "{$collegeName}_{$departmentName}_{$yearName}";
    $collegecode = strtoupper($batchCode);
    // dd($collegecode);

    // Import students from Excel
    Excel::import(
        new StudentsImport($request->college_id, $request->course_id,$request->department_id, $request->year_id, $request->section_id,$collegecode),
        $request->file('students_file')
    );
        return redirect()->route('student.index')->with('message', 'College added successfully!')->with('type', 'success');
    }


public function edit($id)
{
    $student = Student::findOrFail($id);

    $colleges = College::all();
    $courses = Course::all();
    $departments = Department::all();
    $years = Year::all();
    $sections = Section::all();

    return view('admin.student.edit', compact(
        'student',
        'colleges',
        'courses',
        'departments',
        'years',
        'sections'
    ));
}

public function update(Request $request, $id)
{
    $request->validate([
        'college_id' => 'required',
        'course_id' => 'required',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'contact_number' => 'required',
        'department_id' => 'required',
        'year_id' => 'required',
        'section_id' => 'required',
    ]);

    $student = Student::findOrFail($id);

    $student->update([
        'college_id' => $request->college_id,
        'course_id' => $request->course_id,
        'name' => $request->name,
        'email' => $request->email,
        'contact_number' => $request->contact_number,
        'department_id' => $request->department_id,
        'year_id' => $request->year_id,
        'section_id' => $request->section_id,
    ]);

    return redirect()->route('student.index')
                     ->with('message', 'Student Updated Successfully!')->with('type', 'warning');
}




public function destroy($id)
{
    // dd('delete' );

    $student = Student::findOrFail($id);

    // Delete uploaded file if exists
    if ($student->file_upload && \Storage::disk('public')->exists($student->file_upload)) {
        \Storage::disk('public')->delete($student->file_upload);
    }

    $student->delete();

    return redirect()->route('student.index')->with('message', 'Trainer deleted successfully')->with('type', 'danger');
}
}
