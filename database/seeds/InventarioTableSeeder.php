<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Inventario;

class InventarioTableSeeder extends Seeder
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
            Inventario::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'cantidad' => $faker->numberBetween($min = 1, $max = 99)
            ]);
        }
    }
}
