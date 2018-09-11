<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idEspecialidad',
        'idPaciente',
        'fechaInicio',
        'fechaFin',
        'color',
        'titulo',
        'observacion',
        'estado',
        'created_at', 
        'updated_at'
    ];
    public $timestamps = true;
}
