<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Ticket;

class TicketTableSeeder extends Seeder
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
            Ticket::create([
                'mesa_mesero_id' => $faker->numberBetween($min = 1, $max = 6),
                'platillos_mesa' => $faker->numberBetween($min = 1, $max = 6),
                'total' => $faker->numberBetween($min = 1, $max = 99)
            ]);
        }
    }
}
