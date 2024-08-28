<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

class StudentController extends Controller
{
    public  function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|integer',
        ]);
        $code = str_pad(mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT);    
        
        Student::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'course_id' => $validatedData['course_id'],
            'uid' => $code
        ]);
        
        $students = Student::with(['course'])->get();
        $courses = Course::all();
        return redirect()->route('studentsView')->with([
            'students' => $students,
            'courses' => $courses,
        ]);
    }
    
    public function getCode($id){
        $student = Student::find($id);
        
        if ($student) {
            $generator = new BarcodeGeneratorPNG();
            $barcode = $generator->getBarcode($student->uid, $generator::TYPE_CODE_128);
            
            return response($barcode, 200)
            ->header('Content-Type', 'image/png');
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student not found',
            ], 404);
        }
    }
    
    public function search (Request $request){
        $pageSize = 8;
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'course_id' => 'nullable|integer',
        ]);
        
        $query = Student::with(['course']);
        
        if($request->filled('name')) {
            $query->where('name', 'like', '%'.$validatedData['name'].'%');
        }
    
        if ($request->filled('email')) {
            $query->where('email', 'like', '%'. $validatedData['email'].'%');
        }
    
        if ($request->filled('course_id')) {
            $query->wherehas('course', function ($query) use ($validatedData) {
                $query->where('id', '=', $validatedData['course_id']);
            });
        }
    

        $students = $query->paginate($pageSize);
        $courses = Course::all();
    
        return view('students', [
            'students' => $students,
            'courses' => $courses,
        ]);
        
    }
}
