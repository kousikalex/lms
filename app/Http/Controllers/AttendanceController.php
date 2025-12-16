<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;

use Carbon\Carbon;


class AttendanceController extends Controller
{

   public function clock()
{
    $trainer_id = session('trainer_id');
    $now = Carbon::now('Asia/Kolkata');
    $currentDate = $now->toDateString();

    // Find today's attendance
    $attendance = Attendance::where('trainer_id', $trainer_id)
                            ->where('date', $currentDate)
                            ->first();

    return view('trainer.clock', compact('attendance'));
}

    //
    public function punchIn(Request $request)
{
    $trainer_id = session('trainer_id'); // from login session
    // dd($trainer_id);

    // Prevent double punch-in
    $exists = Attendance::where('trainer_id', $trainer_id)
                        ->where('date', date('Y-m-d'))
                        ->whereNotNull('punch_in')
                        ->first();

    if ($exists) {
        return response()->json(['status' => 'error', 'message' => 'You already punched in.']);
    }

    Attendance::updateOrCreate(
        ['trainer_id' => $trainer_id, 'date' => date('Y-m-d')],
        ['punch_in' => $request->time]
    );

    return response()->json(['status' => 'success']);
}

public function punchOut(Request $request)
{
    $trainer_id = session('trainer_id');

    $attendance = Attendance::where('trainer_id', $trainer_id)
                            ->where('date', date('Y-m-d'))
                            ->first();

    if (!$attendance || !$attendance->punch_in) {
        return response()->json(['status' => 'error', 'message' => 'You must punch in first']);
    }

    $attendance->update(['punch_out' => $request->time]);

    return response()->json(['status' => 'success']);
}

 public function calendar()
    {
        $trainer_id = session('trainer_id');


        $attendance = Attendance::where('trainer_id', $trainer_id)
            ->get()
            ->map(function ($item) {

                if ($item->punch_in && $item->punch_out) {
                    $start = Carbon::parse($item->punch_in);
                    $end = Carbon::parse($item->punch_out);

                    $item->effective_hours = $end->diffInMinutes($start);
                } else {
                    $item->effective_hours = null;
                }

                return $item;
            });
        // dd($attendance);


        return view('trainer.calendar', compact('attendance'));
    }

}
