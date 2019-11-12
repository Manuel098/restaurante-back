<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        // for($i=0;$i<10000;$i++){
            $this->get('/api/mesas')->assertStatus(201);
        // }
        $this->post('/api/mesas', [
            'number' => '122'
        ])->assertStatus(411)->assertSee('Need more data');
        $this->post('/api/mesas', [
            'status' => '0',
            'number' => '122'
        ])->assertStatus(201)->assertSee('Successful');
        $this->post('/api/mesas', [
            'status' => 'asd',
            'number' => 'asd'
        ])->assertStatus(501);
        $this->put('/api/mesas/1', [
            'status' => '0',
            'number' => '123'
        ])->assertStatus(201);
    }
}
