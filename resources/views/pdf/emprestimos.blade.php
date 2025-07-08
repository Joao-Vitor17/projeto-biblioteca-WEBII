<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Empréstimos</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .info {
            margin-bottom: 30px;
        }

        .info p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        thead {
            background-color: #f5f5f5;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background-color: #e3e3e3;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10px;
            color: #888;
        }
    </style>
</head>
<body>
    <h2>📚 Relatório de Empréstimos</h2>

    <div class="info">
        <p><strong>Aluno:</strong> {{ $user->name }}</p>
        <p><strong>Telefone:</strong> {{ $user->aluno->telefone }}</p>
        <p><strong>Endereço:</strong> {{ $user->aluno->endereco }}</p>
        <p><strong>Gerado em:</strong> {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título do Livro</th>
                <th>Data do Empréstimo</th>
                <th>Data da Devolução</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($emprestimos as $emprestimo)
                <tr>
                    <td>{{ $emprestimo->id }}</td>
                    <td>{{ $emprestimo->livro->titulo }}</td>
                    <td>{{ $emprestimo->data_emprestimo }}</td>
                    <td>
                        {{ $emprestimo->data_devolucao_real ? $emprestimo->data_devolucao_real : 'Pendente' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #999;">Nenhum empréstimo encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Sistema de Biblioteca - Relatório gerado automaticamente
    </div>
</body>
</html>
