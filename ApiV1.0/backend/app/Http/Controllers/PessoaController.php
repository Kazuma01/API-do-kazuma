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
}