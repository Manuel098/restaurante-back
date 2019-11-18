<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\EfecTotal;

class FTotalTableSeeder extends Seeder
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
            EfecTotal::create([
                'descripcion' => $faker->text($maxNbChars = 15),
                'cantidad' => $faker->numberBetween($min = 1, $max = 200)
            ]);
        }
    }
}
