<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable = [ 
        "cin" , "phone" , "date_of_birth" 
        , "address"  , "user_id" , 
    ] ;
}
