<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autores;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar(){
        $query = Autores::query();
        $Autores = $query->get();
        return view('listar', compact('Autores'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'num_corredor' => 'required|integer',
        ]);
        
        Autores::create([
            'nome' => $request->nome,
            'num_corredor' => $request->num_corredor,
        ]);

        return redirect()->back()->with('success', 'Autor Cadastrado com sucesso!');
    }
}