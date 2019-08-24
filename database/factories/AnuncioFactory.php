<?php

use Faker\Generator as Faker;

$factory->define(App\Anuncio::class, function (Faker $faker) {
    return [
       	'usuario_id' => 1,
        'categoria_id' => 1,
        'titulo' => $faker->name,
        'descricao' => $faker->paragraph,
        'anuncio_slug' => str_slug($faker->name, '-'),
        'valor' => $faker->randomDigit,
        'relevancia' => 1,
        'status' => 1,
        'ativo' => 1,
        'habilitado' => 1,
        'spam'=>0,
                   
    ];
});
