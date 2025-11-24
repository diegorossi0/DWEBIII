<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $data['senha'] = Hash::make($request['senha']);

        $item = User::create($data);
        return response()->json($item, 201);
    }

    public function show(string $id)
    {
        $item = User::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, string $id)
    {
        $item = User::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(['message' => 'Operação realizada com sucesso']);
    }
}
