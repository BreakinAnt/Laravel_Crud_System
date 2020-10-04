<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'id'      => 4,
            'titulo'     => 'Alimentos'
        ]);

        Categoria::create([
            'id'      => 5,
            'titulo'     => 'Informática'
        ]);

        Categoria::create([
            'id'      => 2,
            'titulo'     => 'Eletrodomésticos'
        ]);

        Categoria::create([
            'id'      => 3,
            'titulo'     => 'Celulares'
        ]);
    }
}
