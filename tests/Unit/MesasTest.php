<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory as Faker;
use Tests\TestCase;

class MesasTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $faker =Faker::create();
        // for($i=0;$i<10000;$i++){
            $this->get('/api/mesas')->assertStatus(201);
        // }
        $this->post('/api/mesas', [
            'number' => '122'
        ])->assertStatus(411);
        $this->post('/api/mesas', [
            'status' => '0',
            'number' => '122'
        ])->assertStatus(201);
        $this->post('/api/mesas', [
            'status' => 'asd',
            'number' => 'asd'
        ])->assertStatus(501);
    }
}
