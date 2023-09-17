<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TablaController extends Controller
{
    public function index($numero){

        $tablaMultiplicar = [];

        for ($i = 1; $i <= 10; $i++) {
            $resultado = $i * $numero;
            $type = "$numero * $i = $resultado";
            $tablaMultiplicar[] = $type;
        }

        return response()->json(
            [
            "data"=>[
                "msg"=>"La tabla del $numero es: ",
                "tablas" => $tablaMultiplicar
            ],200
            ]
        );
    }
}
