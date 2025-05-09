<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable = [ 
        "cin" , "phone" , "date_of_birth" 
        , "address"  , "user_id" ,  "status"
    ] ;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function farms(){
        return $this->hasOne(Farm::class);
    }
}
