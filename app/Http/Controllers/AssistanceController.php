<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8; 
        $assistances = Attendance::with(['student', 'lab', 'material', 'teacher'])->paginate($perPage);
        return view('assistances', ['assistances' => $assistances]);

    }
    public function search(Request $request){
     // Validar los datos de la solicitud
     $pageSize = 8;
     $validatedData = $request->validate([
        'name' => 'nullable|string|max:255',
        'date-initial' => 'nullable|date_format:Y-m-d\TH:i',
        'date-final' => 'nullable|date|after_or_equal:date-initial',
    ]);

    // Construir la consulta
    $query = Attendance::with(['student', 'lab', 'material', 'teacher']);

    if ($request->filled('name')) {
        $query->wherehas('student', function ($query) use ($validatedData) {
            $query->where('name', 'like', '%' . $validatedData['name'] . '%');
        });
    }

    if ($request->filled('date-initial')) {
        $query->where('created_at', '>=', $validatedData['date-initial']);
    }

    if ($request->filled('date-final')) {
        $query->where('created_at', '<=', $validatedData['date-final']);
    }

    // Ejecutar la consulta
    $assistances = $query->paginate($pageSize);

    // Devolver los resultados a la vista o como JSON
    return view('assistances', ['assistances' => $assistances]);
    // return response()->json(['date-initial' => $validatedData['date-initial'], 'date-final' => $validatedData['date-final']]);
    }
}