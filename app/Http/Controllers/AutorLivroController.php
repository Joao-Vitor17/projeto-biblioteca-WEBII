<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AutorLivroController extends Controller
{
    public function create()
    {
       $livros = Livro::all();
       $autores = Autor::all();
       return view('autor-livro.create')->with(['livros' => $livros, 'autores' => $autores]);
    }

    public function store(Request $request)
    {
        $request->validate([    
            'livro_id' => [
                'required',
                Rule::exists('livros', 'id')->whereNull('deleted_at')
            ],
            'autor_id' => [
                'required',
                Rule::exists('autores', 'id')->whereNull('deleted_at')
            ],
        ]);

        DB::table('autor_livro')->insert([
            'autor_id' => $request->autor_id,
            'livro_id' => $request->livro_id,
        ]);

        return redirect()->route('autor-livro.create')->with(['success' => 'Autor adicionado no livro com sucesso!!']);
    }
}
