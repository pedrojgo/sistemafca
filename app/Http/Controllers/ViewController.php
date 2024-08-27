<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Lab;
use App\Models\Material;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home(){
        $perPage = 8;
        $attendances = Attendance::with(['student', 'lab', 'material', 'teacher'])
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);
        return view('home',  compact('attendances'));
    }

    public function students(){
        $students = Student::with(['course'])->paginate(8);
        $courses = Course::all();
        return view('students', [
            'students' => $students,
            'courses' => $courses,
        ]); 
    }
    public function users(){
        $users = User::all();
        return view('users', [
            'users' => $users
        ]);
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
    
    public function categories(){
        $teacher = Teacher::all();
        $course = Course::all();
        $labs = Lab::all();
        $materials= Material::all();

        return view('categories',[
            'teachers' => $teacher,
            'courses' => $course,
            'labs' => $labs,
            'materials' => $materials
        ]);
    }
}
