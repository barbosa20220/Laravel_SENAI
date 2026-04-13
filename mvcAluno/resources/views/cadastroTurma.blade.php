<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro Imposto</title>
</head>
<body>
    <h1>Cadatro Imposto</h1>

    @if(session('succes'))
        <p style="color:green">{{ session('succes')}}</p>
    @endif

    <form action="{{route('Imposto.salvar') }}" method="POST">
        @csrf
        <label for="CNPJ">CNPJ: </label>
        <input type="number" name="CNPJ" id="CNPJ" placeholder="CNPJ..."
            require value="{{ old('CNPJ')}}"
        >
        <br><br>
        <label for='Pais'>Pais: </label>
        <input type="text" name="Pais" id="Pais" placeholder="Pais..."
            required value="{{ old('Pais')}}"
        >
        <br><br>
        <label for="Cidade">Cidade: </label>
        <input type="number" name="Cidade" id="Cidade" placeholder="Cidade..."
            require value="{{ old('Cidade')}}"
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