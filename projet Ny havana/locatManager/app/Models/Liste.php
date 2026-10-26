<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    protected $fillable = (['id_locataire',
                            'id_batiment',
                            'id_appart',
                            'adresse',
                            'ville'
                            ]);
                        
    
    public function locataire()
    {
        return $this->belongsTo(Locataires::class, 'id_locataire');
    }

    public function batiment()
    {
        return $this->belongsTo(Batiment::class, 'id_batiment');
    }

    public function appart()
    {
        return $this->belongsTo(Appart::class, 'id_appart');
    }
}

