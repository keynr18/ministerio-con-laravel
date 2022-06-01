<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    //protected $table = 'estados';

    public function municipios(){
        return $this->hasMany('App\Models\Municipio');
    }
}
