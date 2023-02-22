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
    public function test_example(): void
    {
        $response = $this->get(route("luke_skywalker.starships"));

        // Ensure Endpoint returns 200
        $response->assertStatus(200);
    }
}
