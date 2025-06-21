<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $table = 'alunos';
    protected $fillable = ['telefone', 'endereco', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function emprestimos() {
        return $this->hasMany(Emprestimo::class);
    }
}
