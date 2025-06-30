@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🔍✍️ Detalhes do Autor</h2>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">NACIONALIDADE</th>
                <th scope="col">DATA DE NASCIMENTO</th>
                <th scope="col">DATA DE CRIAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $autor->id }}</td>
                <td>{{ $autor->nome }}</td>
                <td>{{ $autor->nacionalidade }}</td>
                <td>{{ $autor->data_nascimento }}</td>
                <td>{{ $autor->created_at }}</td>
            </tr>
        </tbody>
    </table>
    
    <a href="{{ route('autores.index') }}" class="btn btn-primary">Voltar</a>
@endsection