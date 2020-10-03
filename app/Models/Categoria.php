<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function produtos(){
        return $this->hasMany('App\Models\Produto');
    }

    public function addProduto(Produto $prod){
        return $this->produtos()->save($prod);
    }
}
