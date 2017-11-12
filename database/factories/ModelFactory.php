<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/* Factory de Categorias para teste */
$factory->define(App\Models\Categoria::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->unique()->randomElement([
            'Construção civil',
            'Processamento de dados',
            'Industrias de alimentos',
            'Saúde',
            'Educação',
            'Outra',
        ]),
    ];
});

/* Factory de Sindicatos para teste */
$factory->define(App\Models\Sindicato::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->randomElement([
            'Sindicato dos ',
            'Sindicato ',
            'Sindicalistas da ',
            'Associação ',
        ]).
        $faker->randomElement([
            'Construção civil',
            'Processamento de dados',
            'Industrias de alimentos',
            'Saúde',
            'dos gagos',
        ]),
        'nome_responsavel' => $faker->name,
        'sigla' => 'S'.implode($faker->randomElements(['T', 'I', 'O', 'R', 'A', 'C', 'E', 'H', 'S'])),
        'id_categoria' => \App\Models\Categoria::orderByRaw('RANDOM()')->first()->id
    ];
});
