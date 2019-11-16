<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlatillosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->post('/api/platillos', [
            'nombre' => 'Chilaquiles'
        ])->assertStatus(409)->assertSee('Need more data');
        $this->post('/api/platillos', [
            'nombre' => "sad",
            'tipo' => 'Mexicana',
            'precio' => '100',
            'URL' => 'fdg',
            'categoria_id' => '12'
        ])->assertStatus(201)->assertSee('Successful');
        $this->post('/api/platillos', [
            'nombre' => ["adad"],
            'tipo' => 'Mexicana',
            'precio' => ["sdasd"],
            'URL' => 'fdg',
            'categoria_id' => '12'
        ])->assertStatus(500);
    }
}
