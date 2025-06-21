<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use SoftDeletes;

    protected $table = 'autores';
    protected $fillable = ['nome', 'nacionalidade', 'data_nascimento'];

    public function livros() {
        return $this->belongsToMany(Livro::class);
    }
}
