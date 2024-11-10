<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Resposta;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function grafico(Request $request)
    {
        /*$respostas = Resposta::where('cliente_id', $request['cliente'])
                             ->where('teste_id', $request['teste'])
                             ->whereBetween("data",[$request['dataInicial'],$request['dataFinal']])
                             ->get();*/
        
        $respostas = Resposta::join('perguntas', 'respostas.pergunta_id', '=', 'perguntas.id')
                     ->where('respostas.cliente_id', $request['cliente'])
                     ->where('respostas.teste_id', $request['teste'])
                     ->whereBetween('respostas.data', [$request['dataInicial'], $request['dataFinal']])
                     ->get(['respostas.*', 'perguntas.*']);
        
        return response()->json(['data' => $respostas]);
    }
}
