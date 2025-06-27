<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index')->with('categorias', $categorias);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
        ]);

        Categoria::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('categorias.index')->with(['success' => 'Categoria criada com sucesso!!']);
    }
    
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show')->with('categoria', $categoria);
    }

    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.edit')->with('categoria', $categoria);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
        ]);

        Categoria::find($id)->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('categorias.index')->with(['success' => 'Categoria atualizada com sucesso!!']);
    }

    public function destroy(string $id)
    {
        //
    }
}
