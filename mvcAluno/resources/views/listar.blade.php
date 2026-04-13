<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatorio de biblioteca</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>Descricao</th>
                <th>Numero Páginas</th>
                <th>Data Publicaçao</th>
                <th>Editora</th>
                <th>Custo</th>
                <th>Preço</th>
                <th>Imposto</th>
                <th>Atualizar</th>
            </tr>
        </thead>
        <tdody>
            @forelse ($bibliotecas as $biblioteca)
                <tr>
                    <td>{{ $biblioteca->id }}</td>
                    <td>{{ $biblioteca->nome }}</td>
                    <td>{{ $biblioteca->Descricao }}</td>
                    <td>{{ $biblioteca->Numero_Páginas }}</td>
                    <td>{{ $biblioteca->Data_Publicaçao}}</td>
                    <td>{{ $biblioteca->Editora}}</td>
                    <td>{{ $biblioteca->imposto?->Custo}}</td>
                    <td>{{ $biblioteca->imposto?->Preço}}</td>
                    <td>{{ $biblioteca->imposto?->Atualizar}}</td>
                    <td>
                        <a href="{{route('biblioteca.atualizar', $biblioteca->id)}}">Atualizar</a>

                    </td>
                    <td>
                        <form action=" {{ route('biblioteca.deletar', $biblioteca->id)}}" method="POST" onsubmit="return confirmi ('Deseja realmente Atualizar');">
                            @csrf
                            @method('Atualizar')
                            <button type="submit">Atualizar</button>

                        </form>
                    </td>
                </tr>
            @empty 
                <tr>
                    <td colspan="3"> Nenhuma biblioteca encontrada</tr>
                </tr>
            @endforelse 
        </tdody>
    </table>
</body>
</html>