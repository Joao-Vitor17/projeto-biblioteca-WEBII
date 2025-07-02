@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">✍️📖 Adicionar Autores em um Livro</h2>

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

    <form action="{{ route('autor-livro.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="livro_id" class="form-label">Livro</label>
            <select name="livro_id" class="form-select" required>
                <option value="">Selecione um Livro</option>
                @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select name="autor_id" class="form-select" required>
                <option value="">Selecione um Autor</option>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </form>
@endsection