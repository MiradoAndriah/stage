<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Batiment;

class Appart extends Model
{
    protected $fillable = (['id_batiment','etage','logement','loyer']);

    public function batiment()
{
    return $this->belongsTo(Batiment::class, 'id_batiment');
}

}
