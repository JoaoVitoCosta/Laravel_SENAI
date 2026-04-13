<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Livros</title>
</head>
<style>
    table{
        text-align: center
    }
</style>
<body>
    <h1>Relatório de Livros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>NÚMERO PÁGINAS</th>
                <th>DATA PUBLICAÇÃO</th>
                <th>NOME EDITORA</th>
                <th>CUSTO</th>
                <th>PREÇO VENDA</th>
                <th>IMPOSTO</th>
                <th>ID EDITORA</th>
                <th>EDITORA</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livros as $livro);
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livo->nome }}</td>
                    <td>{{ $livro->descricao }}</td>
                    <td>{{ $livro->numeroPaginas }}</td>
                    <td>{{ $livro->dataPublicacao }}</td>
                    <td>{{ $livro->nomeEditora }}</td>
                    <td>{{ $livro->detalhe->custo ?? '' }}</td>
                    <td>{{ $livro->detalhe->precoVenda ?? '' }}</td>
                    <td>{{ $livro->detalhe->imposto ?? '' }}</td>
                    <td>{{ $livro->editoraa?->id }}</td>
                    <td>{{ $livro->editoraa?->nome }}</td>
                    <td>{{ $livro->editoraa?->cnpj }}</td>
                    <td>{{ $livro->editoraa?->pais }}</td>
                    <td>{{ $livro->editoraa?->cidade }}</td>
                    <td>
                        <a href="{{route('livro.atualizar', $livro->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('livro.deletar', $livro->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">Nenhum livro encontrado</td> 
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body> 
</html>