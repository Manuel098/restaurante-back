<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Proveedores;

class ProveedoresTableSeeder extends Seeder
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
            Proveedores::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'descripcion' => $faker->text($maxNbChars = 15),
                'telefono' => $faker->numberBetween($min = 1, $max = 99),
                'email' => $faker->text($maxNbChars = 15),
            ]);
        }
    }
}
