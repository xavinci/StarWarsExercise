<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FirstEpisodeSpeciesClassificationsEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_first_episode_species_classifications(): void
    {
        $response = $this->get(route("first_episode.species"));

        // Ensure Endpoint returns 200
        $response->assertStatus(200);

    }
}
