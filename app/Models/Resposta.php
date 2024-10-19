<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = [
        "resposta"
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }

    public function teste()
    {
        return $this->belongsTo(Teste::class);
    }
}
