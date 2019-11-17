<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Ganancias;

class GananciasTableSeeder extends Seeder
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
            Ganancias::create([
                'ticket_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
        }
    }
}
