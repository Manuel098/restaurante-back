<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriasTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/api/categorias')->assertStatus(201);
        $this->post('/api/categorias', [
            'nombre' => '122'
        ])->assertStatus(411)->assertSee('Need more data');
        $this->post('/api/categorias', [
            'URL' => "sad",
            'nombre' => 'fdg'
        ])->assertStatus(201)->assertSee('Successful');
        $this->post('/api/categorias', [
            'URL' => ["adad"],
            'nombre' => ["sdasd"]
        ])->assertStatus(500);
    }
}
