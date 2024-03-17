<?php

namespace App\Imports;

use App\Models\GestionOp;
use Maatwebsite\Excel\Concerns\ToModel;

class OpImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GestionOp([
            'numero'=> $row[0],
            'libelle'=> $row[1],
            'elaboration'=> $row[2],
            'type'=> $row[3],
            'montant'=> $row[4],
            'regellement'=> isset($row[5]) ? $row[5] : 0,
        ]);
    }
}
