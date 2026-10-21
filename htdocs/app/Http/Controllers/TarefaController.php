<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Http\Requests\TarefaRequest;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tarefas = Tarefa::all();
       return response()->json($tarefas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarefaRequest $request)
    {
        $tarefa = Tarefa::create($request->all());
        return response()->json($tarefa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $tarefa = Tarefa::findOrFail($id);
            return response()->json($tarefa);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarefaRequest $request, string $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($request->all());
        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
