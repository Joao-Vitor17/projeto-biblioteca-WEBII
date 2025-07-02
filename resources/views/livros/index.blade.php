@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">📖 Livros no Sistema</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('livros.create') }}" class="btn btn-primary mb-4">Cadastrar Novo Livro</a>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TÍTULO</th>
                <th scope="col">ESTOQUE</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livros as $livro)
                <tr>
                    <td class="text-center">{{ $livro->id }}</td>
                    <td>{{ $livro->titulo }}</td>
                    @if ($livro->estoque > 0)
                        <td>Disponível</td>
                    @else
                        <td>Indisponível</td>
                    @endif
                    <td>
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('livros.show', $livro->id) }}" method="get">
                                <button type="submit" class="btn btn-success btn-sm">Ver</button>
                            </form>
                            <form action="{{ route('livros.edit', $livro->id) }}" method="get">
                                <button type="submit" class="btn btn-info btn-sm">Editar</button>
                            </form>
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="post" onsubmit="return confirm('Deseja realmente deletar este livro?');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-warning btn-sm">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhum livro encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection