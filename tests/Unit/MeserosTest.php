<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MeserosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->post('/api/meseros', [
            'nombre' => 'Jose Luis'
        ])->assertStatus(409)->assertSee('Need more data');
        $this->post('/api/meseros', [
            'nombre' => 'Jose Luis',
            'number' => '2'
        ])->assertStatus(201)->assertSee('Successful');
        $this->post('/api/meseros', [
            'nombre' => 'Jose Luis',
            'number' => 'sdf'
        ])->assertStatus(501);
    }
}
