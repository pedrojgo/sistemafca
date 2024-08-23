<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ReportesController extends Controller
{
  public function pdf(Request $request){

    $validator = Validator::make($request->all(), [
      'date_initial' => 'required|date_format:Y-m-d\TH:i',
      'date_final' => 'required|date_format:Y-m-d\TH:i|after_or_equal:date_initial',
  ]);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }
    // Fechas validadas y formateadas
    $DateInitial = $request->query('date_initial') . ':00'; 
    $DateFinal = $request->query('date_final') . ':00';

      
    Carbon::setLocale('es');
    $ReportDate = 'Desde el ' .Carbon::parse($DateInitial)->translatedFormat('j \d\e F \d\e Y \a \l\a\s h:i A') . ' a el ' .Carbon::parse($DateFinal)->translatedFormat('j \d\e F \d\e Y \a \l\a\s h:i A');
    $DateGenerator = Carbon::now()->translatedFormat('j \d\e F \d\e Y \a \l\a\s h:i A');

    $attendances = Attendance::with(['student', 'lab', 'material', 'teacher'])
    ->whereBetween('created_at', [$DateInitial, $DateFinal])
    ->get();

    $pdf = Pdf::loadView('report', compact('attendances', 'ReportDate', 'DateGenerator'));
    return $pdf->stream();
  }
}
