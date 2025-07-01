<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index')->with('livros', $livros);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('livros.create')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer|digits:4|max:'.date('Y'),
            'estoque' => 'required|integer|min:1|max:999',
            'categoria_id' => [
                'required',
                Rule::exists('categorias', 'id')->whereNull('deleted_at')
            ]
        ]);

        Livro::create([
            'titulo' => $request->titulo,
            'ano_publicacao' => $request->ano_publicacao,
            'estoque' => $request->estoque,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('livros.index')->with(['success' => 'Livro criado com sucesso!!']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
