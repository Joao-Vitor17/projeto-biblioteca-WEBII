@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🔍📚 Detalhes da Categoria</h2>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">DATA DE CRIAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->descricao }}</td>
                <td>{{ $categoria->created_at }}</td>
            </tr>
        </tbody>
    </table>
    
    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Voltar</a>
@endsection