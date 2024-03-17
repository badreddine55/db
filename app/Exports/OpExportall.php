<?php

namespace App\Exports;

use App\Models\GestionOp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class OpExportall implements FromCollection, WithHeadings
{
    protected $gestionops;

    public function __construct(Collection $gestionops)
    {
        $this->gestionops = $gestionops;
    }

    public function headings(): array
    {
        return [
            'Numero',
            'Libelle',
            'Elaboration',
            'Type',
            'Montant',
            'Regellement'
        ];
    }

    public function collection()
    {
        $data = [];
        
        foreach ($this->gestionops as $gestionop) {
            $data[] = [
                'Numero' => $gestionop->numero,
                'Libelle' => $gestionop->libelle,
                'Elaboration' => $gestionop->elaboration,
                'Type' => $gestionop->type,
                'Montant' => $gestionop->montant,
                'Regellement' => $gestionop->regellement,
            ];
        }

        return collect($data);
    }
}