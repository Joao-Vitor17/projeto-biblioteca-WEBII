@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">✍️ Autores de livro</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('autores.create') }}" class="btn btn-primary mb-4">Cadastrar Novo Autor</a>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($autores as $autor)
                <tr>
                    <td class="text-center">{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('autores.show', $autor->id) }}" method="get">
                                <button type="submit" class="btn btn-success btn-sm">Ver</button>
                            </form>
                            <form action="{{ route('autores.edit', $autor->id) }}" method="get">
                                <button type="submit" class="btn btn-info btn-sm">Editar</button>
                            </form>
                            <form action="{{ route('autores.destroy', $autor->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar este autor?');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-warning btn-sm">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhuma autor encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection