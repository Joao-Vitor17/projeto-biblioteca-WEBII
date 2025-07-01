@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🆕📖 Criar Livro</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" placeholder="A Menina que Roubava Livros" required>
        </div>

        <div class="mb-3">
            <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
            <input type="number" class="form-control" name="ano_publicacao" placeholder="2005" required>
        </div>

        <div class="mb-3">
            <label for="estoque" class="form-label">Estoque</label>
            <input type="number" class="form-control" name="estoque" placeholder="25" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection