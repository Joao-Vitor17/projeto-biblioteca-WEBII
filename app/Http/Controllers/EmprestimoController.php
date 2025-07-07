<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::where('aluno_id', Auth::user()->aluno->id)->get();
        return view('emprestimos.index')->with('emprestimos', $emprestimos);
    }

    public function create()
    {
        $livros = Livro::where('estoque', '>', 0)->get();
        $dataAtual = Carbon::now()->format('Y-m-d');
        $dataFutura = Carbon::now()->addMonth()->format('Y-m-d');
        return view('emprestimos.create')->with(['livros' => $livros, 'dataAtual' => $dataAtual, 'dataFutura' => $dataFutura]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_devolucao_prevista' => 'required|date',
            'descricao' => 'required|string|max:255',
            'livro_id' => [
                'required',
                Rule::exists('livros', 'id')->whereNull('deleted_at')
            ]
        ]);

        Emprestimo::create([
            'data_emprestimo' => Carbon::now()->format('Y-m-d'),
            'data_devolucao_prevista' => $request->data_devolucao_prevista,
            'descricao' => $request->descricao,
            'aluno_id' => Auth::user()->aluno->id,
            'livro_id' => $request->livro_id,
        ]);

        Livro::where('id', $request->livro_id)->decrement('estoque');

        return redirect()->route('emprestimos.create')->with(['success' => 'Empréstimo criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $emprestimo = Emprestimo::find($id);
        return view('emprestimos.show')->with('emprestimo', $emprestimo);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(string $id)
    {
        Emprestimo::find($id)->update([
            'data_devolucao_real' => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect()->route('emprestimos.index')->with(['success' => 'Livro devolvido com sucesso!!']);
    }

    public function destroy(string $id)
    {
        //
    }
}
