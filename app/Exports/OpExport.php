<?php

namespace App\Exports;

use App\Models\GestionOp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class OpExport implements FromCollection, WithHeadings
{
    protected $gestionop;
    public function __construct(GestionOp $gestionop)
    {
        $this->gestionop = $gestionop;
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
        return collect([
            [
                'Numero' => $this->gestionop->numero,
                'Libelle' => $this->gestionop->libelle,
                'Elaboration' => $this->gestionop->elaboration,
                'Type' => $this->gestionop->type,
                'Montant' => $this->gestionop->montant,
                'Regellement' => $this->gestionop->regellement,
            ]
        ]);
    }
}
