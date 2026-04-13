<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    public function listar()
    {
        $biblioteca = Biblioteca::with('turma')->get();
        return view('listar', compact('biblioteca'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'Autor' => 'required|string|max:255|unique:biblioteca,Autor',
            'Descricao' => 'required|string|max:255',
            'NumeroPáginas' => 'required|string|max:255',
            'DataPublicaçao' => 'required|string|max:255',
            'Editora' => 'required|string|nax:255',
            'Custo' => 'required|string|max:255',
            'Preço' => 'required|string|max:255',
            'Imposto_id' => 'nullable|exists:Imposto,id'
        ]);

        Biblioteca::create([
            'nome' => $request->nome,
            'Autor' => $request->Autor,
            'Descricao' => $request->Descricao,
            'NumeroPáginas' => $request->NumeroPágibas,
            'DataPublicaçao' => $request->DataPublicaçao,
            'Editora'=> $request->Editora,
            'Custo' => $request->Custo,
            'Preço' => $request->Preço,
            'Imposto_id' => $request->Imposto_id
        ]);

        return redirect()->back()->with('success', 'Biblioteca cadastrado com sucesso!');
    }

    public function atualizar($id)
    {
        $biblioteca = Biblioteca::findOrFail($id);
        return view('atualizar', compact('biblioteca'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'Autor' => "required|string|max:255",
            'Descricao' => "required|string|max:255",
            'NumeroPáginas' => "required|string|max:255",
            'DataPublicaçao' => "required|string|max:255",
            'Custo' => "required|string|max:255",
            'Preço' => "required|string|max:255",
            'Imposto' => "required|string|max:255|unique:biblioteca,Imposto,$id",
        ]);

        $biblioteca = Biblioteca::findOrFail($id);

        $biblioteca->nome = $request->nome;
        $biblioteca->Autor = $request->Autor;
        $biblioteca->Descricao = $request->Descricao;
        $biblioteca->NumeroPáginas = $request->NumeroPáginas;
        $biblioteca->DataPublicaçao = $request->DataPublicaçao;
        $biblioteca->custo = $request->custo;
        $biblioteca->Preço = $request->Preço;
        $biblioteca->Imposto_id = $request->Imposto_id; 

        $biblioteca->save();

        return redirect()->back()->with('success', 'Biblioteca atualizado com sucesso');
    }

    public function deletar($id)
    {
        $biblioteca = Biblioteca::findOrFail($id);
        $biblioteca->delete();

        return redirect()->route('biblioteca.listar')->with('success', 'Biblioteca excluído com sucesso!');
    }
}