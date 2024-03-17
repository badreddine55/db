<?php

namespace App\Http\Controllers;

use App\Models\GestionOp;
use Illuminate\Http\Request;

class GestionopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $gestionops = GestionOp::all();
        return view('content.tables.tables-basic',['gestionops'=> $gestionops]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestionops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:gestionops',
            'libelle' => 'required',
            'elaboration' => 'required',
            'type' => 'required',
            'montant' => 'required|numeric',
            'regellement' => 'required|boolean',
        ]);

        gestionop::create($request->all());

        return redirect()->route('gestionops.index')
            ->with('success', 'Gestionop created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gestionop  $gestionop
     * @return \Illuminate\Http\Response
     */
    public function show(Gestionop $gestionop)
    {
        return view('gestionops.show', compact('gestionop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gestionop  $gestionop
     * @return \Illuminate\Http\Response
     */
    public function edit(Gestionop $gestionop)
    {
        return view('gestionops.edit', compact('gestionop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gestionop  $gestionop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gestionop $gestionop)
    {
        $request->validate([
            'libelle' => 'required',
            'elaboration' => 'required',
            'type' => 'required',
            'montant' => 'required|numeric',
            'regellement' => 'required|boolean',
        ]);

        $gestionop->update($request->all());

        return redirect()->route('gestionops.index')
            ->with('success', 'Gestionop updated successfully');
    }


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
    
    
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gestionop  $gestionop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gestionop $gestionop)
    {
        $gestionop->delete();

        return redirect()->route('gestionops.index')
            ->with('success', 'Gestionop deleted successfully');
    }
}