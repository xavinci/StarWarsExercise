<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

}
