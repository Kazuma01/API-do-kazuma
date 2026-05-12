<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get("/users", [UserController::class,"index"]);
Route::post("/user", [UserController::class,"store"]);
Route::delete("/users/{id}", [UserController::class,"destroy"]);

Route::get("/test", function(){
//     DB::table('pessoas')->insert([
//     'name' => 'Kazuma',
//     'idade' => 18
// ]);
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
