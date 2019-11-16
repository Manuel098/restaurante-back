<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->post('/api/producto', [
            'nombre' => ''
        ])->assertStatus(409)->assertSee('Need more data');
        $this->post('/api/producto', [
            'nombre' => 'Tomate'
        ])->assertStatus(201)->assertSee('Successful');
    }
}
