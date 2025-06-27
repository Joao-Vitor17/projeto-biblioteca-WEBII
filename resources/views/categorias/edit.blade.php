@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🔄📚 Editar Categoria</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Comédia" value="{{ $categoria->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="Ótima categoria para descontrair" value="{{ $categoria->descricao }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection