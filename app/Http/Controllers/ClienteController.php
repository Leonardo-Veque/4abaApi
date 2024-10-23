<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function Cadastrar(Request $request)
    {
        try {
            Cliente::create([
                "nome"  => $request['nome'],
                "dataNasc" => $request['dataNasc']
            ]);
    
            return response()->json(["data" => "cliente cadastrado","msg" => "de certo"]);
        } catch (\Throwable $th) {
            return response()->json(["data" => "erro ao cadastrar cliente: $th"]);
        }
    }

    public function getAll(Request $request)
    {
        return response()->json(['data' => Cliente::all()]);
    }
}
