<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'locataire_id',
        'appart_id',
        'amount',
        'payment_date',
        'payment_method',
        'month',
        'year',
        'status',
    ];
    public function appart()
    {
        return $this->belongsTo(Appart::class);
    }
}
