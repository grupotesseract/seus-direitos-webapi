<?php

use Illuminate\Database\Seeder;

class FakeCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Categoria::class, 5)->create();
    }
}
