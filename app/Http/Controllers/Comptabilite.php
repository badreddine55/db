<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GestionOp;
class Comptabilite extends Controller
{
    public function comptabilite($id)
    {
        $gestionop = GestionOp::findOrFail($id);

        $gestionop->regellement = !$gestionop->regellement;

        $gestionop->save();
        
        return redirect()->back();
    }
}
