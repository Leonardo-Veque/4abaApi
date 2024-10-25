<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Resposta;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function grafico(Request $request)
    {
        $respostas = Resposta::where('cliente_id', $request['cliente'])
                             ->where('teste_id', $request['teste'])
                             ->whereBetween("data",[$request['dataInicial'],$request['dataFinal']])
                             ->get();
        
        return response()->json(['data' => $respostas]);
    }
}
