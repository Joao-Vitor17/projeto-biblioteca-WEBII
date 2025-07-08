<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Emprestimo;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GerarEmprestimoController extends Controller
{
    public function emitirPdf()
    {
        $user = Auth::user();
        $emprestimos = Emprestimo::where('aluno_id', $user->aluno->id)->get();
        $dompdf = new Dompdf();

        $html = View::make('pdf.emprestimos', ['user' => $user, 'emprestimos' => $emprestimos])->render();
        
        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream();
    }
    
    public function alunosEmitirPdf()
    {
        $user = Auth::user();
        $alunos = Aluno::all();
        $dompdf = new Dompdf();

        $html = View::make('pdf.emprestimos-alunos', ['user' => $user, 'alunos' => $alunos])->render();
        
        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream();
    }
}
