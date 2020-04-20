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
            'Hotelaria',
            '',
            'Outra',
        ]),
    ];
});

/* Factory de Sindicatos para teste */
$factory->define(App\Models\Sindicato::class, function (Faker\Generator $faker) {
    $nome = $faker->randomElement([
        'Sindicato dos ',
        'Sind dos ',
    ])
        .
        $faker->randomElement([
            'Trabalhadores na Construção Civil',
            'Processamento de Dados',
            'Estivadores de Itacoatiara',
            'Condu auto de Veiculos Rodov',
            'Emp em estab Bancarios',
            'Professores',
            'Farmaceuticos',
            'Cirurgioes Dentistas',
            'Medicos Plantonistas',
            'Corretores de Imoveis ',
            'Trab transportes Rodov ',
            'Trabalhadores Rurais',
            'Empregados Estab Serv Saude',
            'Trabalhadores rurais',
            'Serv Publicos Municipais ',
            'Func Serv Publ Munic de Quata',
        ]);

    preg_match_all('/\b\w/', $nome, $matches);
    $sigla = implode('', $matches[0]);

    return [
        'nome' => $nome,
        'nome_responsavel' => $faker->name,
        'sigla' => strtoupper($sigla),
    ];
});
