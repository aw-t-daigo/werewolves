<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PunishmentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $req = $this->withSession([
            'room_id' => '1',
            'player_id' => '1',
            'role_id' => '2'
        ])->json('POST', '/api/punishment', ['player_id' => '2']);

    }
}
