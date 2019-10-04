<?php

use Illuminate\Database\Seeder;
use App\Mesas;

class MesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<100;$i++){
            Mesas::create([
                'status' => 0,
                'number' => $i,
            ]);
        }
    }
}
