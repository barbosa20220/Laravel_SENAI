<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autores;

use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar(){
        $query = Filme::query();
        $Filmes = $query->get();
        return view('listar', compact('Filmes'));
    }

    public function add(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data lançamento' => 'required|integer',
            'sinope' => 'required|numeric',
            'genero' => 'required|numeric',
            'orçamento' => 'required|numeric',
        ]);
        
        Filme::create([
            'titulo' => $request->titulo,
            'data lançamento' => $request->data_lançamento,
            'sinope' => $request->sinope,
            'genero' => $request->genero,
            'orçamento' => $request->orçamento,
            'autor_id' => $request->autor_id
        ]);

        return redirect()->back()->with('success', 'Filme Cadastrado com sucesso!');
    }

    public function cadastro(){
        $autores = Autores::get();
        return view('cadastro', compact('autores'));
    }

    public function atualizar($id){
        $filme = Filme::findOrFail($id);  // Buscar o pelo ID
        return view('atualizar', compact('filme'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'data nascimento' => 'required|int',
            'e-mail' => 'required|numeric',
            'telefone' => 'required|numeric',
        ]);

        $filme = Filme::findOrFail($id); // Busca o produto para ser atualizado

        $filme->nome = $request->nome; // Atualizando o campo nome
        $filme->data_nascimento = $request->data_nascimento; //atualizando o campo quantidade
        $filme->email = $request->email; //atualizando o campo preco
        $filme->telefone = $request->telefone;

        $filme->save(); // Salvando no banco de dados(fazendo update)
        return redirect()->back()->with('success', 'filme atualizado com sucesso');
    }
    
    public function deletar($id){
        $filme = Filme::findOrFail($id); // Buscar o produto pelo ID
        $filme->delete(); // Deletar o produto do banco de dados
        return redirect()->route('filme.listar')->with('success', 'filme deletado com sucesso!');
    }
}