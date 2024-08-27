<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function add(Request $request)
     {

         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
         ]);

         $course = new Course();
         $course->name = $validatedData['name'];
         $course->save();

         return redirect()->back()->with('success', 'Curso agregado exitosamente.');
     }
 

     public function delete($id)
     {
         $course = Course::findOrFail($id);
         $course->delete();
         return redirect()->back()->with('success', 'Curso eliminado exitosamente.');
     }
}
