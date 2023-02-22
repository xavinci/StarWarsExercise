<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    /*
     *  Return a list of the Starships related to Luke Skywalker
     */
    public function lukeSkywalkerStarships(Request $request)
    {
        $url = "https://swapi.dev/api/people/1"; // Luke Skywalker ID = 1
        $response = Http::get($url);
        $data = $response->json(); // Store API Json response as $data
        $starships = []; // Create array for starships

        // Ensure starships have been returned by the API and populated on the $data array
        if(isset($data["starships"]) && is_array($data["starships"])):
            // Loop through starships related to Skywalker - Store in $starships array
            foreach($data["starships"] as $url):
                $response = Http::get($url);
                $starships[] = $response->json();
            endforeach;
        endif;
        return $starships; // Returning array will output as Json
    }

    /*
     *  Return the classification of all species in the 1st episode
     */
    public function firstEpisodeSpecies(Request $request)
    {
        $url = "https://swapi.dev/api/films/4"; // Episode One ID = 4
        $response = Http::get($url);
        $data = $response->json(); // Store API Json response as $data
        $species_classifications = []; // Create array for species classifications

        // Ensure species have been returned by the API and populated on the $data array
        if(isset($data["species"]) && is_array($data["species"])):
            // Loop through species from episode one - Store in $species array
            foreach($data["species"] as $url):
                $response = Http::get($url);
                $species_data = $response->json(); // Store Species Data in Species Data Array
                if(isset($species_data["classification"])): // Ensure Species Data Array contains the correct classication data
                    $species_classifications[] = $species_data["classification"]; // Add to species classification array
                endif;
            endforeach;
        endif;

        // Remove Duplicates
        $species_classifications = array_unique($species_classifications);

        return $species_classifications; // Returning array will output as Json
    }

}
