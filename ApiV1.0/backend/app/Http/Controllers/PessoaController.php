<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index(){
        return Pessoa::all();

    }

    public function show($id){
        return Pessoa::find($id);
    }

    public function store(Request $request){
        return Pessoa::create([
            "name" => $request->name,
            "idade" => $request->idade,
        ]);
    }

    public function destroy($id){
        $pessoa = Pessoa::find($id);

        if(!$pessoa){
            return response()->json(["Erro" => "Pessoa not found"], 404);
        }

        $pessoa -> delete();

        return response()-> json(["Erro" => "Deletado"], 200);
    }

    public function update(Request $request, $id){
        $pessoa = Pessoa::find($id);

        if(!$pessoa){
            return response()->json(["Erro" => "Pessoa not found"], 404);
        }

        $pessoa->update([
            "name" => $request->name,
            "idade" => $request->idade,
        ]);

        return response()->json(["message" => "Pessoa atualizada com sucesso"], 200);
    }
}