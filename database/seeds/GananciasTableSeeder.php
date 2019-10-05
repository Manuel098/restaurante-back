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
        for($i=1; $i<100;$i++){
            Inventario::create([
                'ticket_id' => $faker->text($maxNbChars = 10)
            ]);
        }
    }
}
