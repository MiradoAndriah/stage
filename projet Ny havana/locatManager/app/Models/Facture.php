<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Locataires;

class Facture extends Model
{
    protected $fillable =(
        [
            'numero_facture',
            'compteur',
            'locataire_id',
            'loyer',
            'charge_commune',
            'tva',
            'total'
        ]);
        public function locataires()
        {
            return $this->belongsTo(Locataires::class,'locataire_id');
        }
}

