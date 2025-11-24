<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all());
    }

    public function store(Request $request)
    {
        $item = Categoria::create($request->all());
        return response()->json($item, 201);
    }

    public function show(string $id){
       $item = Categoria::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, string $id){
       $item = Categoria::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return response()->json(['message' => 'Operação realizada com sucesso']);
    }
}
