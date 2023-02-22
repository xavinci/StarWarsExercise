# Star Wars Coding Challenge

## Introduction

Thank you for the opportunity to prepare this Star Wars coding challenge for you. I decided to use Laravel as a framework for this, with 3 simple API routes and a single API controller with 3 corresponding methods. One of the first things I realized while working on the challenge was how slow the API responses would be due to all the calls we need to make to the SWAPI for each endpoint. Therefore, bearing in mind the API results for this particular data set are HIGHLY unlikely to change on a 24-hour basis, I decided to implement some basic file-based caching. After the initial calls are made, the requests become considerably faster as a result. I did include a call to perform the tests in composer using the artisan test command so that upon composer installation, the cache will be populated, so by time you run the first endpoint calls, it should be very fast.  

## API Endpoints

### 1.) GET /luke-skywalker/starships

#### Purpose: Return a list of the Starships related to Luke Skywalker

Response Example:

Content-Type: application/json

    {["X-wing","Imperial shuttle"]}

### 2.) GET /first-episode/species

#### Purpose: Return the classification of all species in the 1st episode

Response Example:

Content-Type: application/json

    {["mammal","artificial","unknown","amphibian","mammals","reptile"]}

### 3.) GET /all-planets/population

#### Purpose: Return the total population of all planets in the Galaxy

Response Example:

Content-Type: application/json

    {"population":"1,711,401,432,500"}

## Testing

Testing can be performed using Laravel's built-in HTTP testing facility. To test all 3 endpoints, simply use the artisan command: 

    php artisan test
