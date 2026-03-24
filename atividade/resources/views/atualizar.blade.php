<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Atualizar Produto</title>
</head>
<body>

<h1>Atualizar Produto</h1>

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

<form action="{{ route('produto.update', $produto->id) }}" method="POST">

@csrf
@method('PUT')

<label>Nome do Produto</label><br>
<input type="text" name="nomeProduto"
value="{{ old('nomeProduto', $produto->nomeProduto) }}" required>
<br><br>

<label>Data de Validade</label><br>
<input type="date" name="dataValidade"
value="{{ old('dataValidade', $produto->dataValidade) }}" required>
<br><br>

<label>Categoria</label><br>
<input type="text" name="categoriaProduto"
value="{{ old('categoriaProduto', $produto->categoriaProduto) }}" required>
<br><br>

<button type="submit">Atualizar</button>

</form>

</body>
</html>