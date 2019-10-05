<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Entrada_Productos;

class EntradaProductoTableSeeder extends Seeder
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
            Entrada_Productos::create([
                'proveedor_id' => $faker->numberBetween($min = 1, $max = 99),
                'producto_id' => $faker->numberBetween($min = 1, $max = 99),
                'cantidad' => $faker->numberBetween($min = 1, $max = 99),
                'precio' => $faker->numberBetween($min = 1, $max = 99)
            ]);
        }
    }
}
