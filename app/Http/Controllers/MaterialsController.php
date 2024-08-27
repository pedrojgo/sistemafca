<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialsController extends Controller
{
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $material = new Material();
        $material->name = $validatedData['name'];
        $material->save();

        return redirect()->back()->with('success', 'Material agregado exitosamente.');
    }

    public function delete($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->back()->with('success', 'Material eliminado exitosamente.');
    }
}
