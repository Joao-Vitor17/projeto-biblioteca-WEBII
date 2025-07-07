@extends('layouts.app')

@section('title', 'Area Admin')

@section('content')
    <h2 class="mb-4">🤓📚 Meus Empréstimos</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TÍTULO DO LIVRO</th>
                <th scope="col">DATA DO EMPRÉSTIMO</th>
                <th scope="col">STATUS</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($emprestimos as $emprestimo)
                <tr>
                    <td class="text-center">{{ $emprestimo->id }}</td>
                    <td>{{ $emprestimo->livro->titulo }}</td>
                    <td>{{ $emprestimo->data_emprestimo }}</td>

                    @if (!$emprestimo->data_devolucao_real)
                        <td>Pendente</td>
                    @elseif ($emprestimo->data_devolucao_real <= $emprestimo->data_devolucao_prevista)
                        <td>Devolvido</td>
                    @else
                        <td>Devolvido com atraso</td>
                    @endif

                    <td>
                        <div class="d-flex justify-content-end gap-2">
                            <form action="{{ route('emprestimos.show', $emprestimo->id) }}" method="get">
                                <button type="submit" class="btn btn-success btn-sm">Ver</button>
                            </form>
                            @if ($emprestimo->data_devolucao_real == null)    
                                <form action="{{ route('emprestimos.update', $emprestimo->id) }}" method="post" onsubmit="return confirm('Deseja realmente devolver este livro?');">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-info btn-sm">Devolver</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Nenhum empréstimo realizado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection