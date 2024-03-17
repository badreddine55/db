<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use App\Models\GestionOp;
use Illuminate\Http\Request;

class Regellement_yes extends Controller
{
    

    public function index()
    {
        // Fetch only records where regellement = 1
        $gestionops = GestionOp::where('regellement', 1)->get();

        return view('content.tables.tables-basic', ['gestionops' => $gestionops,]);
    }
    public function index0()
    {
        // Fetch only records where regellement = 0
        $gestionops = GestionOp::where('regellement', 0)->get();

        return view('content.tables.tables-basic', ['gestionops' => $gestionops,]);
    }
    public function indexall()
    {
        $gestionops = GestionOp::all();
        return view('content.tables.tables-basic', ['gestionops' => $gestionops,]);
    }

}