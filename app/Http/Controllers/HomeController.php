<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Console\SystemOut;
use App\Models\Categoria;
use App\Models\Produto;

class HomeController extends Controller
{
    public function getIndex(){
        SystemOut::print("HomeController.getIndex()");

        return view("index", [
            'siteTitle'=> 'Home CRUD',
            'categoriaId'=>null,
            'categorias'=> Categoria::all(),
            'produtoId'=>-1,
            'produtos'=>Produto::all()
        ]);
    }

    public function postIndex(Request $request){
        SystemOut::print("HomeController.postIndex()");

        $categoriaId = $request->db_cat;
        $produtoId = $request->produto_id;
        $produtoNome = $request->db_nome;
        $produtoPreco = $request->db_preco;

        Produto::addProduto($categoriaId, $produtoNome, $produtoPreco);

        return redirect()->route('home.getindex');
    }

    public function getUpdateProd($id){
        SystemOut::print("HomeController.getUpdateProd()");

        $produto = Produto::find($id);
        
        return view("editProduto", [
            'siteTitle'=> 'Edit CRUD',
            'categoriaId'=>$produto->categoria_id,
            'categorias'=> Categoria::all(),
            'produtoId'=>$id,
            'produto'=>$produto
        ]);
    }

    public function putUpdateProd(Request $request){
        SystemOut::print("HomeController.putUpdateProd()");

        $categoriaId = $request->db_cat;
        $produtoId = $request->produto_id;
        $produtoNome = $request->db_nome;
        $produtoPreco = $request->db_preco;

        Produto::editProduto($categoriaId, $produtoId, $produtoNome, $produtoPreco);

        return redirect()->route('home.getindex');   
    }

    public function deleteProd($id){
        SystemOut::print("HomeController.deleteProd()");

        Produto::deleteProduto($id);

        return redirect()->route('home.getindex');     
    }
}
