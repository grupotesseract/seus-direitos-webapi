<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(LaratrustSeeder::class);

        if (env('APP_ENV') != 'production') {
            $this->call(FakeCategoriasSeeder::class);
            $this->call(FakeSindicatosSeeder::class);
        }
    }
}
