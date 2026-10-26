<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Appart;

class Batiment extends Model
{
    protected $fillable = (['nom_de_batiment']);

    public function apparts()
{
    return $this->hasMany(Appart::class, 'id_batiment');
}

}
