<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\Vendedor;

class VendedorController extends Controller
{

    public function update(Request $request,int $id){
        $vendedor = Vendedor::find($id);
        if($vendedor){
            
        $validate = Validator::make($request->all(), [
            "nombre"     =>"required | min:3 | max:20",
            "ap_paterno" =>"required | min:3 | max:20",
            "sucursal" =>"required | min:4 | max:20",
            "sueldo"       =>"required | min:3 | max:20"
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg'=>"erros en validacion de datos",
                'errors'=> $validate->errors(),
                ],422);
        }

        $vendedor->nombre = $request->nombre;
        $vendedor->ap_paterno = $request->ap_paterno;
        $vendedor->sucursal = $request->sucursal;
        $vendedor->sueldo = $request->sueldo;
        $vendedor->save();            
        }
        return response()->json([
            "msg" => "Persona actualizada correctamente",
            "data" => $vendedor
        ],200);
    }

    public function index(){
        return response()->json([
            "msg" => "Datos encontrados...",
            "data" => Vendedor::all()        
        ]);
    }

    public function store(Request $request,int $numero=0){

        $validate = Validator::make($request->all(), [
            "nombre"     =>"required | min:3 | max:20",
            "ap_paterno" =>"required | min:3 | max:20",
            "sucursal" =>"required | min:3 | max:20",
            "sueldo"       =>"required | min:3 | max:20"
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg'=>"erros en validacion de datos",
                'errors'=> $validate->errors(),
                ],422);
        }

        $vendedor= new Vendedor;
        $vendedor->nombre = $request->nombre;
        $vendedor->ap_paterno = $request->ap_paterno;
        $vendedor->sucursal = $request->sucursal;
        $vendedor->sueldo = $request->sueldo;
        $vendedor->save();
        
        return response()->json([
                "msg"=>"Vendedor ingresado de manera satisfactoria...",
                "date"=> $vendedor
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