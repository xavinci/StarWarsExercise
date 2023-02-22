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
        $data = cached_api_call($url); // API Cached Performance Enhancement

        $starships = []; // Create array for starships

        // Ensure starships have been returned by the API and populated on the $data array
        if(isset($data["starships"]) && is_array($data["starships"])):
            // Loop through starships related to Skywalker - Store in $starships array
            foreach($data["starships"] as $url):
                $starships[] = cached_api_call($url);
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
        $data = cached_api_call($url);
        $species_classifications = []; // Create array for species classifications

        // Ensure species have been returned by the API and populated on the $data array
        if(isset($data["species"]) && is_array($data["species"])):
            // Loop through species from episode one - Store in $species array
            foreach($data["species"] as $url):
                $species_data = cached_api_call($url);
                if(isset($species_data["classification"])): // Ensure Species Data Array contains the correct classication data
                    $species_classifications[] = $species_data["classification"]; // Add to species classification array
                endif;
            endforeach;
        endif;

        // Remove Duplicates
        $species_classifications = array_unique($species_classifications);

        return $species_classifications; // Returning array will output as Json
    }

    /*
     *  Return the total population of all planets in the Galaxy
     */
    public function totalPopulationOfAllPlanets(Request $request)
    {
        $url = "https://swapi.dev/api/planets"; // All Planets
        $data = cached_api_call($url);

        $total_population = 0; // Start Total Population at 0

        if(isset($data["count"])): // Quick validation to ensure correct expected return value from API

            $planets = $data["results"]; // Start a local array of planets
            $url = $data["next"]; // Populate next paginated results URL

            while(count($planets) < $data["count"]): // Continue this loop until all planets are accounted for in the array.

                $planet_data = cached_api_call($url); // Store API Json response as $planet_data

                $planets = array_merge($planets, $planet_data["results"]); // Continue to build the planets array.
                $url = $planet_data["next"]; // The Next Paginated Results URL

            endwhile;

            // Loop through all the stored planets to sum up the total population
            foreach($planets as $planet):
                $total_population = $total_population + intval($planet["population"]);
            endforeach;

        endif;

        /*
         * Returning as Json with label vs. straight number value, by choice. Also returning as formatted number, for easier reading by the user.
         */
        return [
            "population" => number_format($total_population)
        ];

    }



}
