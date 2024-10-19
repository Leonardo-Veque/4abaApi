<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Pergunta;
use App\Models\Teste;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name"          => "admin",
            "password"      => Hash::make("123"),
            "email"         => "admin@admin.com",
        ]);

        Cliente::create([
            "nome"  => "cli01",
            "dataNasc" => "01-02-2001"
        ]);

        $perg = Pergunta::create([
            "descricao" => "pergunta 1"
        ]);

        $teste = Teste::create([
            'tipo' => "teste 01"
        ]);

        $teste->perguntas()->attach($perg->id);
    }
}
