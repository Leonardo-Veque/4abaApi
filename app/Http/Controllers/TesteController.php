<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Teste;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TesteController extends Controller
{
    public function getPerguntas(Request $request)
    {
        
        $teste = Teste::find($request["idTeste"]);
        $cliente = Cliente::find($request["idCliente"]);
        $perguntas = $teste->perguntas;
        return response()->json(["teste" => $perguntas,"cliente" => $cliente]);
    }
}
