@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🔍📖 Detalhes do Livro</h2>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TÍTULO</th>
                <th scope="col">ANO DE PUBLICAÇÃO</th>
                <th scope="col">ESTOQUE</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">DATA DE CRIAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $livro->id }}</td>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->ano_publicacao }}</td>
                <td>{{ $livro->estoque }}</td>
                <td>{{ $livro->categoria->nome }}</td>
                <td>{{ $livro->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <h2 class="mb-4 mt-5">🔍✍️ Detalhes dos Autores deste Livro</h2>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">NACIONALIDADE</th>
                <th scope="col">DATA DE NASCIMENTO</th>
            </tr>
        </thead>
        <tbody>
            @forelse($autores as $autor)
                <tr class="text-center">
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ $autor->nacionalidade }}</td>
                    <td>{{ $autor->data_nascimento }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhuma autor encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <a href="{{ route(Auth::user()->role == 'admin' ? 'livros.index' : 'livros.listar') }}" class="btn btn-primary">Voltar</a>
@endsection