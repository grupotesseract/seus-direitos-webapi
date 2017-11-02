<?php

use Illuminate\Database\Seeder;

/**
 * Seeder do usuario admin master, obtendo os valores do .env ou seguindo com valores default.
 *
 * @TODO: Assim que existir as estrutura de permissões, modificar o seeder de acordo
 */
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name' => 'Admin',
            'email' => env('ADMIN_EMAIL', 'admin@admin.com'),
            'password' => env('ADMIN_SENHA', bcrypt(123321)),
        ]);
    }
}
