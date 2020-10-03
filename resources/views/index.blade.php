@extends('include.layout')

@section('content')

    <h1>Hello Produtos</h1>

    <!-- Tabela de criação de produtos -->
    <form action="{{ route('home.postindex') }}" method="post">
        @csrf
        <input type="hidden" name="produto_id" value="{{$produtoId}}">
        <input type="hidden" name="categoria_id" value="{{$categoriaId}}">

        <div class="categorias">
        @foreach($categorias as $categoria)
            <input type="radio" id="{{$categoria->titulo.'_'.$categoria->id}}" value="{{$categoria->id}}" name="db_cat" required>
            <label for="{{$categoria->titulo}}">{{$categoria->titulo}}</label>
            <br>
        @endforeach
        </div>

        <div class="dados_produto">
            <input type="text" id="db_nome" name="db_nome" placeholder="Nome do produto" required><br>
            <input type="number" step="0.01" id="db_preco" name="db_preco" placeholder="Preço do produto"  required><br>
        </div>

        <!-- Adicionar -->
        <button type="submit">Adicionar</button>   
    </form>
    
    <!-- Lista de produtos -->
    <div class="lista_produtos">
        <table>
            <tr>
                <td>ID</td>
                <td>Categoria</td>
                <td>Nome</td>
                <td>Preço</td>
            </tr>
        @foreach($produtos as $key => $produto)
            <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->categoria->titulo}}</td>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->preco}}</td> 
                <!-- Editar -->
                <td><a href="{{ route('home.getupdateindex', $produto->id) }}">Editar</a></td>              
            </tr>
        @endforeach
        </table>
    </div>
@endsection