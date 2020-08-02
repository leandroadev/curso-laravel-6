@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
    <h1>Exibindo os produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>
    
    <hr>

    <form action="{{ route('products.search') }}" method="post" class="form form-inline">
        @csrf
    <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? ""}}">
        <button type="submit" class="btn btn-info">Pesquisar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="100">Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ url("storage/{$product->image}") }}" alt="$product->name" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                        <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(isset($filters))
        {!! $products->appends($filters)->links() !!} <!--Paginação-->
    @else
        {!! $products->links() !!} <!--Paginação-->
    @endif
@endsection