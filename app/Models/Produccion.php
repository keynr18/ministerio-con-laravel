<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

     protected $fillable = [
        'fechaS',
        'fechaC',
        'cantidadS',
        'cultivo',
        'hacienda_id'
    ];
}
