<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    use HasFactory;

    protected $fillable = [
      'tipo'
    ];

    public function perguntas()
    {
      return $this->belongsToMany(Pergunta::class);
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
