<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\v2\ApiController as Apiv2Controller ;
use App\Http\Controllers\api\v2\TablaController ;
use App\Http\Controllers\api\v2\VendedorController ;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("v1")->group(function (){
    Route::get('/welcome',[ApiController::class,'index']);
    Route::get('/tabla/{numero}',[TablaController::class,'index']);
});


Route::prefix("v2")->group(function (){
    Route::post('/personas',[Apiv2Controller::class,'store']);
    Route::get('/personas',[Apiv2Controller::class,'index']);
    Route::put('/personas/edit/{id}',[Apiv2Controller::class,'update'])
        ->where('id','[0-9]+');


        Route::post('/vendedores',[VendedorController::class,'store']);
        Route::get('/vendedores',[VendedorController::class,'index']);
        Route::put('/vendedores/actualizar/{id}',[VendedorController::class,'update'])
            ->where('id','[0-9]+');
});
