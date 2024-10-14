<?php

namespace App\Http\Controllers;

abstract class Controller
{
    
    protected function jsonSuccess($data = [], $msg = "Sucesso!")
    {
        return response()->json([
            "data"      => $data,
            "message"   => $msg
        ]);
    }

    protected function jsonError($msg, $code = 512)
    {
        return response()->json([
            "message"   => $msg,
            "is_array"  => false
        ], $code);
    }

        /**
     * Method to return an array of errors
     * @param array $errros
     * @param string $msg Mensagem customizada
     * @param int $code HTTP
     */
    protected function jsonErrorArray($errors, $msg = "Multiples errors", $code = 513)
    {
        return response()->json([
            "message"   => $msg,
            "errors"    => $errors,
            "is_array"  => true
        ], $code);
    }
}
