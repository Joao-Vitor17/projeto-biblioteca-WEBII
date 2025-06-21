<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprestimo extends Model
{
    use SoftDeletes;

    protected $table = 'emprestimos';
    protected $fillable = ['data_emprestimo', 'data_devolucao_prevista', 'data_devolucao_real', 'descricao', 'aluno_id', 'livro_id'];

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }

    public function livro() {
        return $this->belongsTo(Livro::class);
    }
}
