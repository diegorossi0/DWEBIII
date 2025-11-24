<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class tarefasController extends Controller
{
   public function index()
    {
        return response()->json(Tarefa::all());
    }

    public function store(Request $request)
    {
        $item = Tarefa::create($request->all());
        return response()->json($item, 201);
    }

    public function show(string $id){
       $item = Tarefa::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, string $id){
       $item = Tarefa::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        Tarefa::destroy($id);
        return response()->json(['message' => 'Operação realizada com sucesso']);
    }
}
