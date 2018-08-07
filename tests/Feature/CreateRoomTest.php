<?php

namespace Tests\Feature;

use App\Http\Requests\CreateRoomPost;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateRoomTest extends TestCase
{
    /**
     * ページ遷移テスト
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->get('/create');
        $response->assertStatus(200);
    }
}
