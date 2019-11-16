<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlatilloMesaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->post('/api/platillomesa', [
            'platillo_id' => '12'
        ])->assertStatus(409)->assertSee('Need more data');
        $this->post('/api/platillomesa', [
            'platillo_id' => '12',
            'mesa_id' => '69'
        ])->assertStatus(201)->assertSee('Successful');
        $this->post('/api/platillomesa', [
            'platillo_id' => 'dfg',
            'mesa_id' => 'ghj'
        ])->assertStatus(501);
        $this->delete('/api/platillomes/25', [ ])->assertStatus(405);
    }
}
