<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class ListaEscuela extends Model
{
    use Searchable;
    protected $fillable=['Nombre', 'CURP', 'No_Control', 'Materia', 'Promedio', 'Observaciones', 'Avatar'];
}
