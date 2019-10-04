<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Mesa_Meseros;

class MesaMeserosTableSeeder extends Seeder
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
            Mesa_Meseros::create([
                'mesero_id' => $faker->numberBetween($min = 1, $max = 99),
                'mesa_id' => $faker->numberBetween($min = 1, $max = 99),
            ]);
        }
    }
}
