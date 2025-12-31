<?php

namespace App\Http\Controllers;
use App\Models\Trainer;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('trainer.login');
    }

     public function login(Request $request)
    {
        // Validate inputs
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Check trainer exists
        $trainer = Trainer::where('email', $request->email)
                          ->where('phone', $request->phone)
                          ->first();

        // If trainer not found
        if (!$trainer) {
            return back()->withErrors([
                'email' => 'Email or Phone number is incorrect',
            ])->withInput();
        }

        // Store trainer session data
        session([
            'trainer_id' => $trainer->id,
            'trainer_name' => $trainer->first_name,
        ]);

        // Redirect to trainer dashboard
        return redirect()->route('trainer.clock')
                         ->with('success', 'Login successful!');
    }



public function studentLogin(Request $request)
{
    // ✅ Validate inputs
    $request->validate([
        'email' => 'required|email',
        'phone' => 'required'
    ]);

    // ✅ Find student by email + phone
    $student = Student::where('email', $request->email)
                      ->where('contact_number', $request->phone)
                      ->first();

    // ❌ Invalid credentials
    if (!$student) {
        return response()->json([
            'status'  => false,
            'message' => 'Invalid email or phone number'
        ], 401);
    }

    // ✅ Store student_id in session
    session([
        'student_id'   => $student->id,
        'student_name' => $student->name
    ]);

    // ✅ JSON Response
    return response()->json([
        'status'     => true,
        'message'    => 'Login successful',
        'student_id' => $student->id,
        'name'       => $student->name
    ]);
}

}
