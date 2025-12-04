@extends('index')

@Section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>
<div class="table-responsive">
    <form action="{{ route('produto.index') }}" method="GET">
        <input type="text" name="pesquisa" class="form-control small" placeholder="Pesquisar...">
        <br>
        <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
        <a type="button" href="{{ route('cadastrar.produto') }}" class="btn btn-success mb-3">Cadastrar</a>
        <a type="button" href="/produtos" class="btn btn-danger mb-3">Limpar</a>
    </form>
    <table class="table table-responsive table-striped table-sm">
        @if ($produtinhos->isEmpty())
            <p>Nenhum produto encontrado.</p>
        @else
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtinhos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('atualizar.produto', ['id' => $produto->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form onclick="deleteRegistroPaginacao('{{route('produto.delete')}}', {{$produto->id}} )" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <meta name="csrf-token" content="{{ csrf_token() }}"> 
                        {{-- acredito que isso foi substituído pelo @csrf     --}}
                        <button  type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif
</div>

@endsection