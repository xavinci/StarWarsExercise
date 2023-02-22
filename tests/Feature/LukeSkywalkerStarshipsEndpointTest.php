<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LukeSkywalkerStarshipsEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_luke_skywalker_starships(): void
    {
        $response = $this->get(route("luke_skywalker.starships"));

        // Ensure Endpoint returns 200
        $response->assertStatus(200);
    }
}
