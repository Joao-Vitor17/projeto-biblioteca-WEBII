@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🆕🤓📖 Realizar Um Empréstimo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('emprestimos.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="data_devolucao_prevista" class="form-label">Data de devolução</label>
            <input type="date" class="form-control" name="data_devolucao_prevista" min="{{ $dataAtual }}" max="{{ $dataFutura }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="Irei devolver daqui uma semana" required>
        </div>

        <div class="mb-3">
            <label for="livro_id" class="form-label">Livro</label>
            <select name="livro_id" class="form-select" required>
                <option value="">Selecione um livro</option>
                @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection