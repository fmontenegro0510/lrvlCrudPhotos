<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;
    protected $fillable = ['apellido', 'nombre', 'dni', 'fecha_matricula', 'domicilio', 'foto'];

    public function concursos()
    {
        return $this->hasMany(Concurso::class);
    }
}
