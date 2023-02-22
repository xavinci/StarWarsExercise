<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
 * Return a list of the Starships related to Luke Skywalker, including all data related to the starships
 */
Route::get('/luke-skywalker/starships', [ \App\Http\Controllers\Api\ApiController::class , "lukeSkywalkerStarships"])->name("luke_skywalker.starships");

/*
 * Return the classification of all species in the 1st episode
 */
Route::get('/first-episode/species', [ \App\Http\Controllers\Api\ApiController::class , "firstEpisodeSpecies"])->name("first_episode.species");

/*
 * Return the total population of all planets in the Galaxy
 */
Route::get('/all-planets/population', [ \App\Http\Controllers\Api\ApiController::class , "totalPopulationOfAllPlanets"])->name("all_planets.population");

