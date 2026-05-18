<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de filmes - Atualizar</title>
</head>
    <body>
        <h1>Controle de filmes - Atualizar</h1>
        @if(session('success'))
            <p style="color:green">{{ session('succes')}}</p>
        @endif

        <form action="{{route('filme.update', $filme->id)}}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="titulo" value="{{ old('titulo', $filme->nome) }}" required>

            <input type="number" name="data lançamento" value="{{ old('quantidade', $filme->quantidade) }}" required>
            
            <input type="text" name="sinope" value="{{ old('sinope', $filme->sinope) }}" required>

            <input type="text" name="genero" value="{{ old('genero', $filme->genero) }}" required>

            <input type="text" name="orçamento" value="{{ old('orçamento', $filme->orçamento) }}" required>
            
            <button type="submit">Atualizar</button>
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