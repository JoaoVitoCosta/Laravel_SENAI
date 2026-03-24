<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro Produto</title>
</head>
<body>

<h1>Cadastro Produto</h1>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

@if($errors->any())
<div style="color:red">
<ul>
@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('produto.salvar') }}" method="POST">

@csrf

<label for="nomeProduto">Nome do Produto:</label>
<input 
type="text" 
name="nomeProduto" 
id="nomeProduto"
placeholder="Nome do Produto..."
required
value="{{ old('nomeProduto') }}"
>

<br><br>

<label for="dataValidade">Data de Validade:</label>
<input 
type="date" 
name="dataValidade" 
id="dataValidade"
required
value="{{ old('dataValidade') }}"
>

<br><br>

<label for="categoriaProduto">Categoria do Produto:</label>
<input 
type="text" 
name="categoriaProduto" 
id="categoriaProduto"
placeholder="Categoria do Produto..."
required
value="{{ old('categoriaProduto') }}"
>

<br><br>

<input type="submit" value="Cadastrar">

</form>

</body>
</html>