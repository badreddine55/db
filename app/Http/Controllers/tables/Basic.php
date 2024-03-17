<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use App\Models\GestionOp;
use Illuminate\Http\Request;

class Basic extends Controller
{
    public function index()
    {

        $gestionops = GestionOp::all();

        // Pass data to the view
        return view('content.tables.tables-basic', [
            'gestionops' => $gestionops,]);
    }
}
