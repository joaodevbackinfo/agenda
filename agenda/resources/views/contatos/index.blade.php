<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .table thead {
            background: #0d6efd;
            color: #fff;
        }

        .container-box {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        footer {
            background: #0d6efd;
            color: white;
            padding: 15px 0;
            margin-top: 50px;
            text-align: center;
        }

        .action-buttons a {
            margin-right: 5px;
        }

        .btn-add {
            float: right;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Agenda de Contatos</a>

            <div>
                <a href="/" class="btn btn-light">Início</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">

        <!-- CONTAINER MODERNO -->
        <div class="container-box">

            <h2 class="mb-4 fw-bold">Contatos Cadastrados</h2>

            <a href="{{ route('contatos.create') }}" class="btn btn-success btn-add">
                ➕ Adicionar Contato
            </a>

            <div class="table-responsive mt-4">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Nascimento</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($contatos as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->nome }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->telefone }}</td>
                                <td>
                                    {{ $c->nascimento ? \Carbon\Carbon::parse($c->nascimento)->format('d/m/Y') : '—' }}
                                </td>
                                <td>{{ $c->endereco ?? '—' }}</td>

                                <td class="action-buttons">

                                    <a href="{{ route('contatos.edit', $c->id) }}"
                                       class="btn btn-primary btn-sm">
                                        ✏️ Editar
                                    </a>

                                    <form action="{{ route('contatos.destroy', $c->id) }}"
                                          method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">
                                            🗑️ Excluir
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    Nenhum contato encontrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <a href="/" class="btn btn-secondary mt-3">⬅️ Voltar</a>

        </div>
    </div>

    <!-- RODAPÉ -->
    <footer>
        Desenvolvido por <strong>João Vítor Piagem</strong> e <strong>Ingrid Costa Sousa</strong>.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
