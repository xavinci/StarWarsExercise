<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/*
 *
 * API Performance Enhancement - Using Cache
 * This API is unlikely to yield different results in subsequent calls, so leveraging a 24-hour cache is low risk, high reward to save on response time.
 */
if(!function_exists("cached_api_call"))
{
    function cached_api_call($url)
    {
        if(Cache::has($url)):
            $data = Cache::get($url);
        else:
            $response = Http::get($url);
            $data = $response->json(); // Store API Json response as $data
            Cache::add($url, $data, now()->addDay()); // Add to cache to enhance performance in subsequent calls
        endif;
        return $data;
    }
}
