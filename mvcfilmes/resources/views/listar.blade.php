<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
</head>

<body>

    <h1>Controle de Filmes</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>DATA LANÇAMENTO</th>
                <th>SINOPSE</th>
                <th>GÊNERO</th>
                <th>ORÇAMENTO</th>
                <th>AUTOR</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>

        <tbody>
            @forelse($filmes as $filme)
                <tr>
                    <td>{{ $filme->id }}</td>
                    <td>{{ $filme->titulo }}</td>
                    <td>{{ $filme->data_lancamento }}</td>
                    <td>{{ $filme->sinopse }}</td>
                    <td>{{ $filme->genero }}</td>
                    <td>{{ $filme->orcamento }}</td>

                    <td>
                        {{ $filme->autor?->nome }}
                    </td>

                    <td>
                        <a href="{{ route('filme.atualizar', $filme->id) }}">
                            Atualizar
                        </a>
                    </td>

                    <td>
                        <form
                            action="{{ route('filme.deletar', $filme->id) }}"
                            method="POST"
                            onsubmit="return confirm('Tem certeza que deseja deletar este filme?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Deletar
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="9">
                        Nenhum filme encontrado
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br><br>

    <h1>Autores</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA NASCIMENTO</th>
                <th>E-MAIL</th>
                <th>TELEFONE</th>
            </tr>
        </thead>

        <tbody>
            @forelse($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ $autor->data_nascimento }}</td>
                    <td>{{ $autor->email }}</td>
                    <td>{{ $autor->telefone }}</td>
                </tr>

            @empty
                <tr>
                    <td colspan="5">
                        Nenhum autor encontrado
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>