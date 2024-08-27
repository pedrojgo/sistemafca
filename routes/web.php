<?php

use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LabsController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\ApiMiddleware;
use App\Http\Middleware\Authenticate;
use App\Models\Attendance;
use App\Models\Lab;
use App\Models\Material;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/login', function () {
    return view('login');
})->name('loginView');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', [ViewController::class, 'home'])->name('homeView');
    Route::get('/students', [ViewController::class, 'students'])->name('studentsView');
    Route::get('assistances', [AssistanceController::class, 'index'])->name('assistanceView');
    Route::get('categories', [ViewController::class, 'categories'])->name('categoriesView');
    Route::get('/users', function () {
        return view('users');
    })->name('usersView');

    Route::post('crete/student', [StudentController::class, 'store'])->name('create-student');
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store'])->name('create-users');
    Route::get('users/create', [UserController::class, 'create'])->name('userCreateView');
    Route::get('/student/{id}', [StudentController::class, 'getCode']);
    Route::get('/pdf/data', [ReportesController::class, 'pdf'])->name('pdfView');
    Route::get('/student/{id}', [StudentController::class, 'getCode']);
    Route::get('/assistance/search', [AssistanceController::class, 'search'])->name('assistance-search');
    Route::get('/students/search', [StudentController::class, 'search'])->name('students-search');

    Route::post('/teacher/create', [TeachersController::class, 'add'])->name('teachers.add');
    Route::delete('/teachers/delete/{id}', [TeachersController::class, 'delete'])->name('teachers.delete');

    Route::post('/course/create', [CourseController::class, 'add'])->name('courses.add');
    Route::delete('/course/{id}', [CourseController::class, 'delete'])->name('courses.delete');

    Route::post('/material/create', [MaterialsController::class, 'add'])->name('materials.add');
    Route::delete('/material/{id}', [MaterialsController::class, 'delete'])->name('materials.delete');

    Route::post('/lab/create', [LabsController::class, 'add'])->name('labs.add');
    Route::delete('/lab/{id}', [LabsController::class, 'delete'])->name('labs.delete');
});

Route::middleware([ApiMiddleware::class])->group(function () {
    Route::get('/get/labs', function () {
        $labs = Lab::all();
        return $labs;
    });


    Route::get('/get/teachers', function () {
        $teachers = Teacher::all();
        return $teachers;
    });

    Route::get('/get/materials', function () {
        $teachers = Material::all();
        return $teachers;
    });

    Route::post('/create/attendances', function (Request $request) {

        $validatedData = $request->validate([
            'uid' => 'required',
            'lab_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'material_id' => 'required|integer',
            'created_at' => 'required|date',
        ]);

        $student = Student::where('uid', $validatedData['uid'])->first();

        if (!$student) return response()->json(['error' => 'Student not found'], 400);

        Attendance::create([
            'student_id' => $student->id,  
            'lab_id' => $validatedData['lab_id'],  
            'teacher_id' => $validatedData['teacher_id'],  
            'material_id' => $validatedData['material_id'],  
            'created_at' => $validatedData['created_at'], 
        ]);
        $message = 'Entrada registrada de '. $student->name;
        return response()->json(['success' => 'attendances created', 'messages' => $message]);
    });
});
