<?php

namespace App\Http\Controllers\form_layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GestionOp;

class HorizontalForm extends Controller
{
  public function index()
  {
    return view('content.form-layout.form-layouts-horizontal');
  }

  public function store(Request $request)
  {
      $request->validate([
          'numero' => 'required|unique:gestionop',
          'libelle' => 'required',
          'elaboration' => 'required',
          'type' => 'required',
          'montant' => 'required|numeric',
          // 'regellement' => 'required|boolean', // Remove this line from validation rules
      ]);
  
      $data = $request->except('regellement'); 
      GestionOp::create($data);
  
      return redirect()->route('form-layouts-horizontal')
          ->with('success', 'Data inserted successfully.');
  }
      public function destroy($id)
    {
        $gestionop = GestionOp::findOrFail($id);
        $gestionop->delete();

        return redirect()->route('content.tables.tables-basic')
            ->with('success', 'Data deleted successfully.');
    }
}
