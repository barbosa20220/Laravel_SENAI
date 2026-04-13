<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
</head>
<body>

    <h1>Cadastro Livro</h1>
    <a href="#" class="link-listar">Listar Livros</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('biblioteca.salvar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Nome..." required value="{{ old('nome') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" placeholder="Autor..." required value="{{ old('autor') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <input type="text" name="descricao" id="descricao" placeholder="Descricao..." required value="{{ old('descricao') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="numero_paginas">Numero Páginas:</label>
            <input type="number" name="numero_paginas" id="numero_paginas" placeholder="Paginas..." required value="{{ old('numero_paginas') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="data_publicacao">Data Publicação:</label>
            <input type="date" name="data_publicacao" id="data_publicacao" required value="{{ old('data_publicacao', date('Y-m-d')) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="editora">Editora:</label>
            <select name="editora" id="editora" required>
                <option value="Nova Letra Editora" {{ old('editora') == 'Nova Letra Editora' ? 'selected' : '' }}>Nova Letra Editora</option>
                </select>
        </div>
        <br>
        <div class="form-group">
            <label for="custo">Custo:</label>
            <input type="number" step="0.01" name="custo" id="custo" placeholder="Custo..." required value="{{ old('custo') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" name="preco" id="preco" placeholder="Preço..." required value="{{ old('preco') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="imposto">Imposto:</label>
            <input type="number" step="0.01" name="imposto" id="imposto" placeholder="Imposto..." required value="{{ old('imposto') }}">
        </div>
        <br>
        <div style="text-align:;">
            <input type="submit" value="Cadastrar">
        </div>
    </form>

    @if($errors->any())
        <div style="color: red; margin-top: 20px;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>