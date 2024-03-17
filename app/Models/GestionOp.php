<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionOp extends Model
{
    use HasFactory;
    protected $table = 'gestionop';
    protected $fillable = [
        'numero',
        'libelle',
        'elaboration',
        'type',
        'montant',
        'regellement',
    ];
}
