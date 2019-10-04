<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Categorias;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create();
        for($i=1; $i<100;$i++){
            Categorias::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'URL' => $faker->text($maxNbChars = 15)
            ]);
        }
    }
}
