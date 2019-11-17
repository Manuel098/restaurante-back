<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InventarioTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->post('/api/platillos', [
            'nombre' => 'dfg'
        ])->assertStatus(409)->assertSee('Need more data');
        $this->post('/api/inventario', [
            'nombre' => 'Lorem ipsum',
            'cantidad' => '28'
        ])->assertStatus(201)->assertSee('Successful');
        $this->post('/api/inventario', [
            'nombre' => 'Lorem ipsum',
            'cantidad' => 'gfd'
        ])->assertStatus(201);
    }
}
