<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Platillos;

class PlatillosTableSeeder extends Seeder
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
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => $faker->text($maxNbChars = 10),
                'categoria_id' => $faker->numberBetween($min = 1, $max = 99)
            ]);
        }
    }
}
