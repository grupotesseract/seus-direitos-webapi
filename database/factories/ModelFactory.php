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
    return [
        'nome' => $faker->randomElement([
            'SINDICATO DOS ',
            'SIND DOS',
        ])
        .
        $faker->randomElement([
            'TRABALHADORES NA CONSTRUÇÃO CIVIL',
            'PROCESSAMENTO DE DADOS',
            'ESTIVADORES DE ITACOATIARA',
            'CONDU AUTO DE VEICULOS RODOV D.MANACAPURU',
            'EMP EM ESTAB BANCARIOS NO ESTADO DO AMAZONAS',
            'PROFESSORES DE MANAUS',
            'FARMACEUTICOS DO AMAZONAS',
            'CIRURGIOES – DENTISTAS DO AMAZONAS',
            'MEDICOS DO ESTADO DO AMAZONAS',
            'CORRETORES DE IMOVEIS DO ESTADO DO AMAZONAS.',
            'TRAB.EM TRANSPORTES RODOV.DE RIO GRANDE',
            'TRABALHADORES RURAIS DE FRED WESTPHALEN',
            'EMPREGADOS EM ESTAB.SERV.SAUDE DE CAX SUL',
            'TRABALHADORES RURAIS',
            'SERV PUBLICOS MUNICIPAIS DE STO ANASTACIO',
            'FUNCIONARIOS E SERV.PUBL.MUNIC.DE QUATA',
            'SERVIDORES PUBLICOS MUNICIPAIS DE IPUA',
            'SERVIDORES PUBL MUNICIPAIS DE ITUVERAVA',
            'PUBLICOS MUN EST TURISTICA IBITINGA',
        ]),
        'nome_responsavel' => $faker->name,
        'sigla' => 'S'.implode($faker->randomElements(['T', 'I', 'O', 'R', 'A', 'C', 'E', 'H', 'S'])),
        'id_categoria' => \App\Models\Categoria::orderByRaw('RANDOM()')->first()->id,
    ];
});
