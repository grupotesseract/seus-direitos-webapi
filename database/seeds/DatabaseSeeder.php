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
        $this->call(AdminUserSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);

        if (env('APP_ENV') != 'production') {
            $this->call(FakeCategoriasSeeder::class);
            $this->call(FakeSindicatosSeeder::class);
        }
    }
}
