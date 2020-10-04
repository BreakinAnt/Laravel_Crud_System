@extends('include.layout')

@section('content')

    <a id="home_atalho" href="{{ route('home.getindex') }}"><h1>Hello Produtos</h1></a>

    <!-- Tabela de criação de produtos -->
    <div class="input_form">
        <form action="{{ route('home.postindex') }}" method="post">
            @csrf
            <input type="hidden" name="produto_id" value="{{$produtoId}}">
            <input type="hidden" name="categoria_id" value="{{$categoriaId}}">

            <div id="categorias">
            @foreach($categorias as $categoria)
                    <input type="radio" id="{{$categoria->titulo.'_'.$categoria->id}}" value="{{$categoria->id}}" name="db_cat" required>
                    <label for="{{$categoria->titulo}}">{{$categoria->titulo}}</label>
            @endforeach
            </div>

            <div id="dados_produto">
                <input type="text" id="db_nome" name="db_nome" placeholder="Nome do produto" required><br>
                <input type="number" step="0.01" id="db_preco" name="db_preco" placeholder="Preço do produto"  required><br>
            </div>

            <!-- Adicionar -->
            <button type="submit">Adicionar</button>   
        </form>
    </div>
    <!-- Lista de produtos -->
    <div class="tabela">
        <table>
            <tr id="tabela_atributos">
                <th>ID</th>
                <th>Categoria</th>
                <th>Nome</th>
                <th>Preço</th>
                <th></th>
            </tr>
        @foreach($produtos as $key => $produto)
            <tr id="tabela_produto">
                <td>{{$produto->id}}</td>
                <td>{{$produto->categoria->titulo}}</td>
                <td>{{$produto->nome}}</td>
                <td>$ {{$produto->preco}}</td> 
                <!-- Editar -->
                <td id="tabela_editar"><a href="{{ route('home.getupdateindex', $produto->id) }}">Editar</a></td>              
            </tr>
        @endforeach
        </table>
    </div>
@endsection