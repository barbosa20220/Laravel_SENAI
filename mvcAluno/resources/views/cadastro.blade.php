<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro Usuarios</title>
</head>
<body>
    <h1>Cadatro Usuarios</h1>

    @if(session('succes'))
        <p style="color:green">{{ session('succes')}}</p>
    @endif

    <form action="{{route('aluno.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome')}}"
        >
        <br><br>
        <label for='email'>Email: </label>
        <input type="email" name="email" id="email" placeholder="email..."
            required value="{{ old('email')}}"
        >
        <input type="submit" value="cadastrar">
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }} </li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>