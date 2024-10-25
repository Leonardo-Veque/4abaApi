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
       /*
        User::create([
            "name"          => "admin",
            "password"      => Hash::make("123"),
            "email"         => "admin@admin.com",
        ]);

        Cliente::create([
            "nome"  => "cli01",
            "dataNasc" => "01-02-2001"
        ]);
        //*/
        $perg = [
            Pergunta::create(["descricao" => "Tempo você consegue se concentrar em uma tarefa antes de se distrair?"]),
            Pergunta::create(["descricao" => "Alguma diferença na sua capacidade de foco em diferentes situações?"]),
            Pergunta::create(["descricao" => "Realizar tarefas que exigem concentração por um longo período?"]),
            Pergunta::create(["descricao" => "Notou se a sua capacidade de atenção varia em ambientes diferentes?"]),
            Pergunta::create(["descricao" => "Perde objetos necessários para tarefas diárias?"]),
        ];

        $testeTDAH = Teste::create([
            'tipo' => 'TDAH',
        ]);

        $testeTDAH->perguntas()->attach(array_map(fn($perg) => $perg->id, $perg));
        
        $pergAutismo = [
            Pergunta::create(["descricao" => "Dificuldade em entender expressões faciais e gestos de outras pessoas"]),
            Pergunta::create(["descricao"=> "Preferencia de estar sozinho"]),
            Pergunta::create(["descricao" => "Dificuldade em seguir instruções ou completar tarefas em casa, no trabalho ou na escola"]),
        ];

        $testeAutismo = Teste::create([
            'tipo' => 'Autismo'
        ]);
        
        $testeAutismo->perguntas()->attach([
            $perg[2]->id,
            $pergAutismo[0]->id,
            $pergAutismo[1]->id,
            $pergAutismo[2]->id,
        ]);

        $pergImperatividade = [
            Pergunta::create(['descricao' => 'Acoes frequentes sem perceber']),
            Pergunta::create(['descricao'=>'Existencia de compulsoes comportamentais']),
            Pergunta::create(['descricao'=>'Lidar com impulsos']),
            Pergunta::create(['descricao'=>'Ansiedade elevada'])
        ];

        $testeImperatividade = Teste::create([
            'tipo' => 'Imperatividade'
        ]);

        $testeImperatividade->perguntas()->attach([
            $perg[2]->id,
            $pergAutismo[2]->id,
            $pergImperatividade[0]->id,
            $pergImperatividade[1]->id,
            $pergImperatividade[2]->id,
            $pergImperatividade[3]->id,
        ]);
    }
}
