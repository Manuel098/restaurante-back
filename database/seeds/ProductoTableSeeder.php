<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Producto;

class ProductoTableSeeder extends Seeder
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
            Producto::create([
                'nombre' => $faker->text($maxNbChars = 15)
            ]);
        }
    }
}
