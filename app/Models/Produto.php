<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Console\SystemOut;
use App\Models\Categoria;

class Produto extends Model
{
    protected $fillable = ['categoria_id', 'nome', 'preco'];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public static function addProduto($categoriaId, $produtoNome, $produtoPreco){
        SystemOut::print("Produto.addProduto()");

        $produto = new Produto;
        $produto->categoria_id = $categoriaId;
        $produto->nome = $produtoNome;
        $produto->preco = abs($produtoPreco);

        Categoria::find($categoriaId)->addProduto($produto);
    }

    public static function editProduto($categoriaId, $produtoId, $produtoNome, $produtoPreco){
        SystemOut::print("Produto.editProduto()");

        SystemOut::print($produtoId);

        $produto = Produto::find($produtoId);
        $produto->categoria_id = $categoriaId;
        $produto->nome = $produtoNome;
        $produto->preco = abs($produtoPreco);

        $produto->update();
    }

    public static function deleteProduto($produtoId){
        SystemOut::print("Produto.deleteProduto()");
        
        $produto = Produto::find($produtoId);
        
        $produto->delete();
    }
}
