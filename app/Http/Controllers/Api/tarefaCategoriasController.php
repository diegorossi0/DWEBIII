<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TarefaCategoria;
use Illuminate\Http\Request;

class tarefaCategoriasController extends Controller
{
    public function index()
    {
        return response()->json(TarefaCategoria::all());
    }

    public function store(Request $request)
    {
        $item = TarefaCategoria::create($request->all());
        return response()->json($item, 201);
    }

    public function show(string $id){
       $item = TarefaCategoria::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, string $id){
       $item = TarefaCategoria::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        TarefaCategoria::destroy($id);
        return response()->json(['message' => 'Operação realizada com sucesso']);
    }

    public function vincularCategorias(Request $request)
    {
        $validated = $request->validate([
            'idtarefa' => 'required|integer|exists:tarefas,idtarefa',
            'categorias' => 'required|array',
            'categorias.*' => 'integer|exists:categorias,idcategoria'
        ]);

        $idtarefa = $validated['idtarefa'];
        $categorias = $validated['categorias'];

        
        // Remove todas as categorias antigas dessa tarefa
        TarefaCategoria::where('idtarefa', $idtarefa)->delete();
        
        // Cria novas associações
        foreach ($categorias as $idcategoria) {
            TarefaCategoria::create([
                'idtarefa' => $idtarefa,
                'idcategoria' => $idcategoria
            ]);
        }

        return response()->json(['message' => 'Categorias atualizadas com sucesso.']);
    }
}
