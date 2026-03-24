<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relatório de Produtos</title>
</head>
<body>

<h1>Relatório de Produtos</h1>

<table border="1">

<thead>
<tr>
<th>ID</th>
<th>Nome Produto</th>
<th>Data Validade</th>
<th>Categoria</th>
<th>Atualizar</th>
<th>Deletar</th>
</tr>
</thead>

<tbody>

@forelse($produtos as $produto)

<tr>
<td>{{ $produto->id }}</td>
<td>{{ $produto->nomeProduto }}</td>
<td>{{ $produto->dataValidade }}</td>
<td>{{ $produto->categoriaProduto }}</td>

<td>
<a href="{{ route('produto.atualizar', $produto->id) }}">
Atualizar
</a>
</td>

<td>
Faremos na próxima aula
</td>

</tr>

@empty

<tr>
<td colspan="6">Nenhum produto encontrado</td>
</tr>

@endforelse

</tbody>

</table>

</body>
</html>