<?php

namespace App\Http\Controllers;
use App\Models\Trainer;
use Illuminate\Http\Request;

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


}
