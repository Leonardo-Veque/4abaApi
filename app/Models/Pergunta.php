<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = [
        "descricao"
    ];

    public function testes()
    {
        return $this->belongsToMany(Teste::class);
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
