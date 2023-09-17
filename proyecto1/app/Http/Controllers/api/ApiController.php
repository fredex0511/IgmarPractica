<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request , int $numero=0){
        $nombre = $request->get('nombre');

        if($numero>10)
            $type = "Hola $nombre el numero $numero es mayor a 10";
        else if($numero<10)
            $type = "Hola $nombre el numero $numero es menor a 10";
        else
         $type = "Hola $nombre el numero $numero es igual a 10";
        return response()->json(
            ["msg"=>"Hola mundo desde mi api",
             "type" => $type
        ],200);
    }
}
