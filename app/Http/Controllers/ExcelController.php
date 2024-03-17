<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OpImport;
use App\Exports\OpExport;
use App\Exports\OpExportall;
use App\Models\GestionOp;

class ExcelController extends Controller
{
    public function excel()
    {
        return view("Excel.import");
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);
    
        // Check if the validation passes
        if ($request->file('file')->isValid()) {
            // Proceed with importing the Excel file
            Excel::import(new OpImport, $request->file('file'));
            return redirect()->back()->with('success', 'File imported successfully.');
        } else {
            // If the file is not valid, redirect back with an error message
            return redirect()->back()->with('error', 'The uploaded file is not valid.');
        }
    }
    
    public function exportall()
    {
        $gestionops = GestionOp::all();
        
        if ($gestionops->isNotEmpty()) {
            return Excel::download(new OpExportall($gestionops), 'All_GestionOps.xlsx');
        } else {
            return redirect()->back()->with('error', 'No records found.');
        }
    }
    
    
       
    public function export($id)
    {
        $gestionop = GestionOp::find($id);
    
        if ($gestionop) {
            return Excel::download(new OpExport($gestionop), $gestionop->libelle . '.xlsx');
        } else {
            return redirect()->back()->with('error', 'Record not found.');
        }
    }


    
    
}
