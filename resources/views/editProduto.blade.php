@extends('include.layout')

@section('content')

    <a id="home_atalho" href="{{ route('home.getindex') }}"><h1>Hello Produtos</h1></a>

    <!-- Tabela de edição/remoção de produtos -->
    <div class="input_form">
        <form action="{{ route('home.putupdateindex') }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="produto_id" value="{{$produtoId}}">
            <input type="hidden" name="categoria_id" value="{{$categoriaId}}">

                <h3>EDITANDO</h3>
                <p>ID: {{$produto->id}}</p>

            <div id="categorias">
            @foreach($categorias as $categoria)
                <input type="radio" id="{{$categoria->titulo.'_'.$categoria->id}}" value="{{$categoria->id}}" name="db_cat" @if($categoriaId == $categoria->id) checked="checked" @endif required>
                <label for="{{$categoria->titulo}}">{{$categoria->titulo}}</label>
                <br>
            @endforeach
            </div>

            <div id="dados_produto">
                <input type="text" id="db_nome" name="db_nome" placeholder="Nome do produto" value="{{$produto->nome}}" required><br>
                <input type="number" step="0.01" id="db_preco" name="db_preco" placeholder="Preço do produto" value="{{$produto->preco}}" required><br>
            </div>

        <!-- Editar -->
            <button type="submit">Editar</button>    
        </form>
    
        <!-- Deletar -->
        <form action="{{ route('home.deleteindex', $produto->id) }}" method="delete">
            @method('DELETE')
            <button type="submit">Remover</button>  
        </form>
    </div>

@endsection