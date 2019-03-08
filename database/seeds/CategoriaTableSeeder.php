<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = new Categoria();
        $categoria->categoria_nome = 'oleos';
        $categoria->categoria_slug = str_slug("oleos", '-');
        $categoria->save();
    }
}
