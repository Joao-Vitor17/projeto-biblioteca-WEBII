@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🔄✍️ Editar Autor</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('autores.update', $autor->id) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Machado de Assis" value="{{ $autor->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="nacionalidade" class="form-label">Nacionalidade</label>
            <input type="text" class="form-control" name="nacionalidade" placeholder="Brasileiro" value="{{ $autor->nacionalidade }}" required>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" max="{{ $dataAtual }}" value="{{ $autor->data_nascimento }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection