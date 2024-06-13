<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function getWeather()
    {
        if (Cache::has('cached_weather_data'))
        {
            $weatherData = Cache::get('cached_weather_data');
            $cacheTimestamp = Cache::get('cached_weather_data_timestamp');
            return view('weather', ['weatherData' => $weatherData, 'cacheTimestamp' => $cacheTimestamp]);
        }

        // Replace 'YOUR_API_KEY' with your OpenWeather API key
        $apiKey = env('WEATHER_API');

        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=Kuressaare&units=metric&appid={$apiKey}";

        try {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);
            $cacheTimestamp = now();
            Cache::put('cached_weather_data', $data, now()->addMinutes(15));
            Cache::put('cached_weather_data_timestamp', $cacheTimestamp, now()->addMinutes(15));

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('weather', ['weatherData' => $data,'cacheTimestamp' => $cacheTimestamp]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}