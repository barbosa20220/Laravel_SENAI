<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro Turma</title>
</head>
<body>
    <h1>Cadatro Turma</h1>

    @if(session('succes'))
        <p style="color:green">{{ session('succes')}}</p>
    @endif

    <form action="{{route('turma.salvar') }}" method="POST">
        @csrf
        <label for="numSala">numSala: </label>
        <input type="number" name="numSala" id="numSala" placeholder="numSala..."
            require value="{{ old('numSala')}}"
        >
        <br><br>
        <label for='Serie'>Serie: </label>
        <input type="text" name="Serie" id="Serie" placeholder="Serie..."
            required value="{{ old('Serie')}}"
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