<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home(){
        $attendances = Attendance::with(['student', 'lab', 'material', 'teacher'])->get();
        return view('home', ['attendances' => $attendances]);
    }

    public function students(){
        $attendances = Attendance::with(['student', 'lab', 'material', 'teacher'])->get();
        return view('home', ['attendances' => $attendances]);
    }
     
    public function store(Request $request){   
        $validatedData = $request->validate([
            'student_id' => 'required|number',
            'lab_id' => 'required|number',
            'material_id' => 'required|number',
            'teacher_id' => 'required|number',
            'created_at' => 'required',
        ]);
     
        $attendance = Attendance::create([
            'student_id' => $validatedData['student_id'],
            'lab_id' => $validatedData['lab_id'],
            'material_id' => $validatedData['material_id'],
            'teacher_id' => $validatedData['teacher_id'],
            'created_at' => $validatedData['created_at'],
        ]);

        return $attendance;
    }
}
