<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MesaTableSeeder::class,
            MeserosTableSeeder::class,
            MesaMeserosTableSeeder::class,
            CategoriasTableSeeder::class,
            PlatillosTableSeeder::class
        ]);
    }
}
