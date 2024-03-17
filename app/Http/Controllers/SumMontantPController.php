<?php

namespace App\Http\Controllers;

use App\Models\GestionOp;
use Illuminate\Http\Request;

class SumMontantPController extends Controller
{
    public function getSumOfMontantWithRegellement()
    {
        // Retrieve gestionops where regellement is '0'
        $gestionopsZero = GestionOp::where('regellement', 0)->get();
        // Calculate the sum of montant where regellement is 0
        $sumZero = $gestionopsZero->sum('montant');
    
        // Retrieve gestionops where regellement is '1'
        $gestionopsOne = GestionOp::where('regellement', 1)->get();
        // Calculate the sum of montant where regellement is 1
        $sumOne = $gestionopsOne->sum('montant');
    
        // Return JSON response with sums
        return response()->json(['sumZero' => $sumZero, 'sumOne' => $sumOne]);
    }
}

