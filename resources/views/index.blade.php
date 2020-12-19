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
            <tr id="tabela_produto" onclick="showProduct({{$produto}})">
                <td>{{$produto->categoria->titulo}}</td>
                <td style="cursor: pointer;">{{$produto->nome}}</td>
                <td>${{number_format($produto->preco, 2)}}</td> 
                <!-- Editar -->
                <td id="tabela_editar"><a href="{{ route('home.getupdateindex', $produto->id) }}">Editar</a></td>              
            </tr>
        @endforeach
        </table>
    </div>

    <a href="https://github.com/BreakinAnt/Laravel_Crud_System">Source Code</a>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div id="produto_modal">
            <tr>
            </tr>
        </div>
    </div>

    <script>
        function showProduct(produto){
            let prodModal = document.getElementById("modal");
            let prodModalList = document.getElementById("produto_modal");
            
            prodModalList.innerHTML = "";

            prodModalList.appendChild(createChild(`Produto ID: ${produto.id}`, "modal_prod_id"));
            prodModalList.appendChild(createChild(`Produto Nome: ${produto.nome}`, "modal_prod_nome"));
            prodModalList.appendChild(createChild(`Produto Preço: $${produto.preco.toFixed(2)}`, "modal_prod_preco"));
            prodModalList.appendChild(createChild(`Data Criado: ${new Date(produto.created_at)}`, "modal_prod_created"));

            prodModal.style.display = "block";
            window.onclick = function(event){
                if(event.target == modal){
                    prodModal.style.display = "none";
                }
            }
        }

        //HELPER
        function createChild(text, className){
            let prodPara = document.createElement("td");
            prodPara.className = className;
            prodPara.appendChild(document.createTextNode(text));
            return prodPara;
        }
    </script>
@endsection