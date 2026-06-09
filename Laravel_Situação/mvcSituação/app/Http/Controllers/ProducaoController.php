<?php

namespace App\Http\Controllers;

use App\Models\Producao;
use Illuminate\Http\Request;

class ProducaoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producao::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('tipo')) {
            $query->where('tipo_materia_prima', $request->tipo);
        }

        if ($request->filled('data')) {
            $query->whereDate('data_fabricacao', $request->data);
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_materia_prima' => 'required|string|max:100',
            'data_fabricacao' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'preco_venda' => 'required|numeric|min:0'
        ]);

        $producao = Producao::create($dados);

        return response()->json([
            'mensagem' => 'Produção cadastrada com sucesso!',
            'dados' => $producao
        ], 201);
    }

    public function show($id)
    {
        $producao = Producao::find($id);

        if (!$producao) {
            return response()->json([
                'erro' => 'Produção não encontrada.'
            ], 404);
        }

        return response()->json($producao, 200);
    }

    public function update(Request $request, $id)
    {
        $producao = Producao::find($id);

        if (!$producao) {
            return response()->json([
                'erro' => 'Produção não encontrada.'
            ], 404);
        }

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_materia_prima' => 'required|string|max:100',
            'data_fabricacao' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'preco_venda' => 'required|numeric|min:0'
        ]);

        $producao->update($dados);

        return response()->json([
            'mensagem' => 'Produção atualizada com sucesso!',
            'dados' => $producao
        ], 200);
    }

    public function destroy($id)
    {
        $producao = Producao::find($id);

        if (!$producao) {
            return response()->json([
                'erro' => 'Produção não encontrada.'
            ], 404);
        }

        $producao->delete();

        return response()->json([
            'mensagem' => 'Produção removida com sucesso!'
        ], 200);
    }
}