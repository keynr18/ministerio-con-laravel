<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hacienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'direccion',
        'telefono',
        'hectaria',
        'estado',
        'municipio',
        'parroquia',
        'parroquia_id'
    ];

     // relacion uno a muchos para las producciones
     public function producciones(){
        return $this->hasMany('App\Models\Produccion');
    }

     // relacion uno a uno para las producciones
     public function estados(){
        return $this->hasOne('App\Models\Estado');
    }
}
