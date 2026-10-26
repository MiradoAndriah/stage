<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locataires extends Model
{
    protected $fillable = (['type','nom','prenom','contact','mail','cin','nif','stat','adresse','statut']);
}
