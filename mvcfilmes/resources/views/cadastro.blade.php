<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Filmes</title>
</head>

<body>

    <h1>Cadastro de Filmes</h1>

    @if(session('success'))
        <p style="color: green">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('filme.salvar') }}" method="POST">
        @csrf

        <!-- TITULO -->
        <label for="titulo">Título:</label>
        <input
            type="text"
            name="titulo"
            id="titulo"
            placeholder="Digite o título do filme"
            required
            value="{{ old('titulo') }}">
        <br><br>

        <!-- DATA LANÇAMENTO -->
        <label for="data_lancamento">Data de lançamento:</label>
        <input
            type="date"
            name="data_lancamento"
            id="data_lancamento"
            required
            value="{{ old('data_lancamento') }}">
        <br><br>

        <!-- SINOPSE -->
        <label for="sinopse">Sinopse:</label>
        <br>
        <textarea
            name="sinopse"
            id="sinopse"
            cols="40"
            rows="5"
            placeholder="Digite a sinopse do filme"
            required>{{ old('sinopse') }}</textarea>
        <br><br>

        <!-- GENERO -->
        <label for="genero">Gênero:</label>
        <input
            type="text"
            name="genero"
            id="genero"
            placeholder="Digite o gênero"
            required
            value="{{ old('genero') }}">
        <br><br>

        <!-- ORÇAMENTO -->
        <label for="orcamento">Orçamento:</label>
        <input
            type="number"
            name="orcamento"
            id="orcamento"
            placeholder="Digite o orçamento"
            min="0"
            required
            value="{{ old('orcamento') }}">
        <br><br>

        <!-- AUTOR -->
        <label for="autor_id">Autor:</label>
        <select name="autor_id" id="autor_id" required>
            <option value="">Selecione um autor</option>

            @foreach ($autores as $autor)
                <option value="{{ $autor->id }}">
                    {{ $autor->nome }}
                </option>
            @endforeach
        </select>

        <br><br>

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>