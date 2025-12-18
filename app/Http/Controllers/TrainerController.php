<?php

namespace App\Http\Controllers;
use App\Models\Trainer;
use App\Models\allocate;
use App\Models\Student;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TrainerController extends Controller
{
      public function index()
    {
        $data = Trainer::all();
        return view('admin.trainer.index',compact('data'));
    }

    public function create()
    {
        return view('admin.trainer.create');
    }

 public function store(Request $request)
{
    // Validation
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:trainers,email',
        'phone' => 'required',
        'emergency_name' => 'required',
        'emergency_number' => 'required',
        'account_number' => 'required',
        'experience' => 'required',
        'trainer_type' => 'required|in:inhouse,freelancer',
        'file_upload' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
    ]);

    // File upload
    $filePath = null;

    if ($request->hasFile('file_upload')) {
        $filePath = $request->file('file_upload')->store('trainers', 'public');
    }

    // Save in DB
    Trainer::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'emergency_name' => $request->emergency_name,
        'emergency_number' => $request->emergency_number,
        'account_number' => $request->account_number,
        'experience' => $request->experience,
        'trainer_type' => $request->trainer_type,
        'file_upload' => $filePath,
    ]);

    return redirect()->route('trainer.index')->with('success', 'Trainer added successfully!');
}

public function edit($id)
{
    // dd('edit' );
    $trainer = Trainer::findOrFail($id);
    return view('admin.trainer.edit', compact('trainer'));
}

public function update(Request $request, $id)
{
    $trainer = Trainer::findOrFail($id);

    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:trainers,email,' . $id,
        'phone' => 'required',
        'emergency_name' => 'required',
        'emergency_number' => 'required',
        'account_number' => 'required',
        'experience' => 'required',
        'trainer_type' => 'required|in:inhouse,freelancer',
        'file_upload' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $filePath = $trainer->file_upload;

    if ($request->hasFile('file_upload')) {

        if ($filePath && \Storage::disk('public')->exists($filePath)) {
            \Storage::disk('public')->delete($filePath);
        }

        $filePath = $request->file('file_upload')->store('trainers', 'public');
    }

    $trainer->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'emergency_name' => $request->emergency_name,
        'emergency_number' => $request->emergency_number,
        'account_number' => $request->account_number,
        'experience' => $request->experience,
        'trainer_type' => $request->trainer_type,
        'file_upload' => $filePath,
    ]);

    return redirect()->route('trainer.index')->with('success', 'Trainer updated successfully!');
}



public function destroy($id)
{
    // dd('delete' );

    $trainer = Trainer::findOrFail($id);

    // Delete uploaded file if exists
    if ($trainer->file_upload && \Storage::disk('public')->exists($trainer->file_upload)) {
        \Storage::disk('public')->delete($trainer->file_upload);
    }

    $trainer->delete();

    return redirect()->route('trainer.index')->with('success', 'Trainer deleted successfully');
}



public function work()
{
    $trainer_id = session('trainer_id');

    $today = Carbon::today()->format('Y-m-d');

    // UPCOMING: Not started yet
    $upcoming = Allocate::where('trainer_id', $trainer_id)
        ->where('status', 0)
        ->where('from_date', '>', $today)
        ->get();


    // IN-PROGRESS: Currently running
    $inProgress = Allocate::where('trainer_id', $trainer_id)
        ->where('status', 0)
        ->where('from_date', '<=', $today)
        ->where('to_date', '>=', $today)
        ->get();
    // dd($inProgress);


    // COMPLETED: Finished work
    $completed = Allocate::where('trainer_id', $trainer_id)
        ->where('status', 1)
        ->get();
    // dd($completed);


    return view('trainer.trainerwork', compact('upcoming', 'inProgress', 'completed'));
}


public function student_attendance()
{
    $trainer_id = session('trainer_id');
    $batchNames = Allocate::where('trainer_id', $trainer_id)
                     ->pluck('batch_name');
    // dd($batchNames);


   return view('trainer.attendance', compact('batchNames'));
}

public function getBatchDetails(Request $request)

{
    $batch = $request->batch_name;
    // dd($batch);
    $student = Student::where('batch_number', $batch)->first();

    if (!$student) {
        return response()->json(['error' => 'Batch not found'], 404);
    }

    return response()->json([
        'department_id' => $student->department_id,
        'department_name' => $student->department->name,

        'year_id' => $student->year_id,
        'year_name' => $student->year->name,

        'section_id' => $student->section_id,
        'section_name' => $student->section->name,
    ]);
}
public function getBatchStudents(Request $request)
{
    $batch = $request->batch_name;
    $date  = $request->attendance_date;

    // ✅ Check if attendance already done
    $alreadyDone = StudentAttendance::where('batch_name', $batch)
        ->where('attendance_date', $date)
        ->exists();

    if ($alreadyDone) {
        return response()->json([
            'already_done' => true
        ]);
    }

    // ✅ Fetch students if not done
    $students = Student::where('batch_number', $batch)->get();
    // dd($students);

    return response()->json([
        'already_done' => false,
        'students' => $students
    ]);
}

public function store_student(Request $request)
    {
        $request->validate([
            'batch_name' => 'required',
            'attendance_date' => 'required|date',
            'attendance' => 'required|array'
        ]);

        // 🔒 Check if attendance already exists
        $exists = StudentAttendance::where('batch_name', $request->batch_name)
            ->where('attendance_date', $request->attendance_date)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Attendance already recorded for this date'
            ], 409);
        }

        foreach ($request->attendance as $item) {
            StudentAttendance::create([
                'student_id' => $item['student_id'],
                'batch_name' => $request->batch_name,
                'attendance_date' => $request->attendance_date,
                'attendance' => $item['attendance'],
            ]);
        }

        return response()->json([
            'message' => 'Attendance saved successfully'
        ]);
    }



}
