<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pergunta;
use App\Models\Resposta;
use App\Models\Teste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TesteController extends Controller
{
    public function getPerguntas(Request $request)
    {
        if($request['idTeste'] == -1){
            return response()->json(['erro' => 'nenhum teste seleccionado']);
        }
        $teste = Teste::find($request["idTeste"]);
        $perguntas = $teste->perguntas;
        return response()->json(["teste" => $perguntas]);
    }

    public function pegarClienteTeste(){
        try {
            $clientes = Cliente::select('nome','id')->get();

            $testes = Teste::select('tipo','id')->get();
    
            return response()->json([
                'clientes' => $clientes,
                'testes' => $testes
            ]);
            
        } catch (\Throwable $th) {
            return response()->json(["data" => "erro ao cadastrar cliente: $th"]);
        }
    }

    public function enviarRespostas(Request $request)
    {
       
        
        if($request['cliente'] == -1 || $request['teste'] == -1){
            return response()->json(['err' => 'cliente ou teste nulo']);
        }
        for($i = 0;$i < count($request['respostas']);$i++) {
            $data = [
                'cliente_id' => $request['cliente'],
                'teste_id' => $request['teste'],
                'pergunta_id' => $request['IDrespostas'][$i],
                'data' => Carbon::now(),
            ];
            
            $values = [
                'resposta' => $request['respostas'][$i],
                'updated_at' => now()
            ];
            
            Resposta::updateOrInsert($data, $values);
        }

        
        

        return response()->json(['success' => 'Respostas salvas com sucesso!']);
    }
}
