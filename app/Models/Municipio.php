<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

   /* public function estados(){
        return $this->hasOne('App\Models\Estado');
    }*/

    public function parroquia(){
        return $this->hasMany('App\Models\Parroquia');
    }
}
