<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function index(){
        return User::all();
    }
    public function store(Request $request){
        return User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
    }
    public function destroy($id){
       $user = User::find($id);

       if(!$user){return response()-> json(["Erro" => "User not found"], 404);}

       $user-> delete();

       return response()->json(["Mensagen" => "Deletado"],200);
    }
}           