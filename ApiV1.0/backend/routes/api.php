<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\DB;


Route::get("/users", [UserController::class,"index"]);
Route::post("/user", [UserController::class,"store"]);
Route::delete("/users/{id}", [UserController::class,"destroy"]);

Route::get("/pessoas/{id}", [PessoaController::class,"show"]);
Route::get("/pessoas", [PessoaController::class,"index"]);
Route::post("/pessoas", [PessoaController::class,"store"]);
Route::delete("/pessoas/{id}", [PessoaController::class,"destroy"]);
Route::put("/pessoas/{id}", [PessoaController::class,"update"]);

Route::get("/test", function(){
    DB::table('pessoas')->insert([
    'name' => 'kazuma',
    'idade' => 32
]);
    return "Inserido com Sucesso";
});


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
