<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Platillo_Mesa;

class PlatilloMesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create();
        for($i=1; $i<7;$i++){
            Platillo_Mesa::create([
                'nombre'=> $faker->text($maxNbChars = 15),
                'tipo'=> $faker->text($maxNbChars = 15),
                'precio'=> $faker->text($maxNbChars = 15),
                'platillo_id' => $faker->numberBetween($min = 1, $max = 6),
                'mesa_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
        }
    }
}
