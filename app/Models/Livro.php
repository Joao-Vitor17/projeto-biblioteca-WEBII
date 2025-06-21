<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use SoftDeletes;

    protected $table = 'livros';
    protected $fillable = ['titulo', 'ano_publicacao', 'estoque', 'categoria_id'];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function emprestimos() {
        return $this->hasMany(Emprestimo::class);
    }

    public function autores() {
        return $this->belongsToMany(Autor::class);
    }
}
