<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index')->with('autores', $autores);
    }

    public function create()
    {
        $dataAtual = Carbon::now()->format('Y-m-d');
        return view('autores.create')->with('dataAtual', $dataAtual);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before_or_equal:today',
        ]);

        Autor::create([
            'nome' => $request->nome,
            'nacionalidade' => $request->nacionalidade,
            'data_nascimento' => $request->data_nascimento,
        ]);

        return redirect()->route('autores.index')->with(['success' => 'Autor criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $autor = Autor::find($id);
        return view('autores.show')->with('autor', $autor);
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
