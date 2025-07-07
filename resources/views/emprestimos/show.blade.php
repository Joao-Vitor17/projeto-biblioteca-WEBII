@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🔍🤓📚 Detalhes do Emprestimo</h2>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DATA DO EMPRESTIMO</th>
                <th scope="col">DATA DE DEVOLUÇÃO PREVISTA</th>
                <th scope="col">DATA DE DEVOLUÇÃO</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">DATA DE CRIAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $emprestimo->id }}</td>
                <td>{{ $emprestimo->data_emprestimo }}</td>
                <td>{{ $emprestimo->data_devolucao_prevista }}</td>
                <td>{{ $emprestimo->data_devolucao_real ? $emprestimo->data_devolucao_real : 'Pendente' }}</td>
                <td>{{ $emprestimo->descricao }}</td>
                <td>{{ $emprestimo->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <h2 class="mb-4 mt-5">🔍📖 Detalhes do Livro deste emprestimo</h2>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITULO</th>
                <th scope="col">ANO DE PUBLICAÇÃO</th>
                <th scope="col">ESTOQUE</th>
                <th scope="col">CATEGORIA</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $emprestimo->livro->id }}</td>
                <td>{{ $emprestimo->livro->titulo }}</td>
                <td>{{ $emprestimo->livro->ano_publicacao }}</td>
                <td>{{ $emprestimo->livro->estoque }}</td>
                <td>{{ $emprestimo->livro->categoria->nome }}</td>
            </tr>
        </tbody>
    </table>
    
    <a href="{{ route('emprestimos.index') }}" class="btn btn-primary">Voltar</a>
@endsection