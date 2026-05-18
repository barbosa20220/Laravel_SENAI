<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Autor</title>
</head>

<body>

    <h1>Cadastro de Autor</h1>

    @if(session('success'))
        <p style="color: green">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('autor.salvar') }}" method="POST">
        @csrf

        <!-- NOME -->
        <label for="nome">Nome:</label>
        <input
            type="text"
            name="nome"
            id="nome"
            placeholder="Digite o nome do autor"
            required
            value="{{ old('nome') }}">
        <br><br>

        <!-- DATA DE NASCIMENTO -->
        <label for="data_nascimento">
            Data de nascimento:
        </label>

        <input
            type="date"
            name="data_nascimento"
            id="data_nascimento"
            required
            value="{{ old('data_nascimento') }}">
        <br><br>

        <!-- EMAIL -->
        <label for="email">E-mail:</label>
        <input
            type="email"
            name="email"
            id="email"
            placeholder="Digite o e-mail"
            required
            value="{{ old('email') }}">
        <br><br>

        <!-- TELEFONE -->
        <label for="telefone">Telefone:</label>
        <input
            type="text"
            name="telefone"
            id="telefone"
            placeholder="Digite o telefone"
            required
            value="{{ old('telefone') }}">
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