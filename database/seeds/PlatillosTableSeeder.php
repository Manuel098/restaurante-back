<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Platillos;

class PlatillosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create();
        for($i=1; $i<5;$i++){
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "https://ichef.bbci.co.uk/news/660/cpsprodpb/134E3/production/_105057097_a226d870-cc5f-4043-9f4b-d452b75cc280.jpg",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "https://ichef.bbci.co.uk/news/660/cpsprodpb/134E3/production/_105057097_a226d870-cc5f-4043-9f4b-d452b75cc280.jpg",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "http://www.hdfondos.eu/pictures/2015/0531/1/falitas-mexicano-comidas-pics-170839.jpg",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "https://imagenescityexpress.scdn6.secure.raxcdn.com/sites/default/files/2017-08/comida-mexicana-patrimonio.jpg",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "https://imagenescityexpress.scdn6.secure.raxcdn.com/sites/default/files/inline-images/comida-mexicana-patrimonio-humanidad.jpg",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0DnsCi-6ScXCIxmV-DKT_D6KF29E39wyKvwgS42pqlH3ITo4x&s",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "https://d25rq8gxcq0p71.cloudfront.net/language-guide/758/pepperoni%20pizza.jpg",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
            Platillos::create([
                'nombre' => $faker->text($maxNbChars = 15),
                'tipo' => $faker->text($maxNbChars = 10),
                'precio' => $faker->numberBetween($min = 1, $max = 499),
                'URL' => "https://www.ngenespanol.com/wp-content/uploads/2018/08/La-comida-callejera-es-una-experiencia-gastron%C3%B3mica-en-M%C3%A9xico.jpg",
                'categoria_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
        }
    }
}
