<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Meseros;

class MeserosTableSeeder extends Seeder
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
            Meseros::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'number' => $faker->tollFreePhoneNumber(),
            ]);
        }
    }
}
