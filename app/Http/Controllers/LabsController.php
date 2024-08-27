<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabsController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $lab = new Lab();
        $lab->name = $validatedData['name'];
        $lab->save();

        return redirect()->back()->with('success', 'Laboratorio agregado exitosamente.');
    }

    public function delete($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->delete();

        return redirect()->back()->with('success', 'Laboratorio eliminado exitosamente.');
    }
}
