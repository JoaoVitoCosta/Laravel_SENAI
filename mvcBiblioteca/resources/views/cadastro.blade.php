<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{ route('livro.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Livro..." require value="{{old('nome')}}">
        <br><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" placeholder="Autor..." require value="{{old('autor')}}">
        <br><br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="Descrição..." require value="{{old('descricao')}}">
        <br><br>

        <label for="numeroPaginas">Número de páginas:</label>
        <input type="number" name="numeroPaginas" id="numeroPaginas" placeholder="Número de Páginas..." require value="{{old('numeroPaginas')}}">
        <br><br>

        <label for="DataPublicacao">Data Publicação:</label>
        <input type="date" name="DataPublicacao" id="DataPublicacao" placeholder="Data de publicação do Livro..." require value="{{old('dataPublicacao')}}">
        <br><br>

        <label for="editoraa">Editora do Livro:</label>
        <input type="text" name="editoraa" id="editoraa" placeholder="Editora do Livro..." require value="{{old('editoraa')}}">
        <br><br>

        <label for="custo">Custo do Livro:</label>
        <input type="text" name="custo" id="custo" placeholder="Custo do Livro..." require value="{{old('custo')}}">
        <br><br>

        <label for="preco">Preço do Livro:</label>
        <input type="text" name="preco" id="preco" placeholder="Preço do Livro..." require value="{{old('preco')}}">
        <br><br>
        
        <label for="imposto">Imposto do Livro:</label>
        <input type="text" name="imposto" id="imposto" placeholder="Imposto do Livro..." require value="{{old('imposto')}}">
        <br><br>


        <label for="editora_id">Editora:</label>
        <select name="editora_id" id="editora_id" required>
            <option value="" disabled selected>Selecione a Editora</option>

            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}">
                    Editora - {{ $editora->nome }} - N° {{ $editora->editoraa }}
                </option>
            @endforeach
        </select>
        
        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>

        </div>
    @endif 
</body>
</html> 