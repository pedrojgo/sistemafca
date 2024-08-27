<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
  
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->save();
        return redirect()->back()->with('success', 'Teacher agregado exitosamente.');
    }

    public function delete($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->delete();
            return redirect()->back()->with('success', 'Teacher eliminado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Teacher no encontrado.');
        }
    }
}
