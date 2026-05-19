<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\DB;


Route::get("/pessoas/{id}", [PessoaController::class,"show"]);
Route::get("/pessoas", [PessoaController::class,"index"]);
Route::post("/pessoas", [PessoaController::class,"store"]);
Route::delete("/pessoas/{id}", [PessoaController::class,"destroy"]);
Route::put("/pessoas/{id}", [PessoaController::class,"update"]);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
