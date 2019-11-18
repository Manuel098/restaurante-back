<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Categorias;

class CategoriasTableSeeder extends Seeder
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
            Categorias::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'URL' => "https://ichef.bbci.co.uk/news/660/cpsprodpb/134E3/production/_105057097_a226d870-cc5f-4043-9f4b-d452b75cc280.jpg"
            ]);
        }
    }
}
