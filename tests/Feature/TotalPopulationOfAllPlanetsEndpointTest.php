<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TotalPopulationOfAllPlanetsEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_total_population_of_all_planets(): void
    {
        $response = $this->get(route("all_planets.population"));

        // Ensure Endpoint returns 200
        $response->assertStatus(200);

    }
}
