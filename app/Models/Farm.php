<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = [
        'name',
        'location',
        'size',
        'Status', 
        "activities" , 
        "description" ,
        'farmer_id',
        "farmerCertificate" ,
        "nationalId" ,
        "landDocument" ,
        "oncaAttestation",
        "agriculturalRegisters" ,
        "farmDetailsDoc"
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
