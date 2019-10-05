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
        for($i=1; $i<100;$i++){
            Platillo_Mesa::create([
                'platillo_id' => $faker->numberBetween($min = 1, $max = 99),
                'mesa_id' => $faker->numberBetween($min = 1, $max = 99)
            ]);
        }
    }
}
