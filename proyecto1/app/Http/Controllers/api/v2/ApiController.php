<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\Persona;

class ApiController extends Controller
{

    public function update(Request $request,int $id){
        $persona = Persona::find($id);
        if($persona){
            
        $validate = Validator::make($request->all(), [
            "nombre"     =>"required | min:3 | max:20",
            "ap_paterno" =>"required | min:3 | max:20",
            "ap_materno" =>"nullable | min:3 | max:20",
            "sexo"       =>"required | min:3 | max:20"
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg'=>"erros en validacion de datos",
                'errors'=> $validate->errors(),
                ],422);
        }

        $persona->nombre = $request->nombre;
        $persona->ap_paterno = $request->ap_paterno;
        $persona->ap_materno = $request->get('ap_materno',null);
        $persona->sexo = $request->sexo;
        $persona->save();            
        }
        return response()->json([
            "msg" => "Persona actualizada correctamente",
            "data" => $persona
        ],200);
    }

    public function index(){
        return response()->json([
            "msg" => "Datos encontrados...",
            "data" => Persona::all()        
        ]);
    }

    public function store(Request $request,int $numero=0){

        $validate = Validator::make($request->all(), [
            "nombre"     =>"required | min:3 | max:20",
            "ap_paterno" =>"required | min:3 | max:20",
            "ap_materno" =>"nullable | min:3 | max:20",
            "sexo"       =>"required | min:3 | max:20"
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg'=>"erros en validacion de datos",
                'errors'=> $validate->errors(),
                ],422);
        }

        $persona= new Persona;
        $persona->nombre = $request->nombre;
        $persona->ap_paterno = $request->ap_paterno;
        $persona->ap_materno = $request->get('ap_materno',null);
        $persona->sexo = $request->sexo;
        $persona->save();
        
        return response()->json([
                "msg"=>"Persona registrada de manera satisfactoria...",
                "date"=> $persona
                ]
                ,201);
    }
}

//$nombre = $request->get("nombre");
//$type=null;
//if($numero > 10)
//$type = "hola {$nombre} el numero {$numero} es mayor que 10";
//else if($numero == 10)
//$type = "hola {$nombre} el numero {$numero} es igual que 10";
//else
//$type = "hola {$nombre} el numero {$numero} es menor que 10";