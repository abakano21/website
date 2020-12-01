<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function index()
    {
        $daysToFilter = 30;

        $historyCollection = $this->getLastDays($daysToFilter);
        
        return view('welcome')->with(
            'historyCollection', $historyCollection
        );
    }
    public function filterHistory()
    {
        $daysToFilter = 30;

        $data = Http::post(env('WEATHER_BASE_URL').'/api/2.0/weathers/getbydate', [
            "jsonrpc" => "2.0", 
            "method" => "weather.getByDate", 
            "params" => [
                "date" => "2020-08-26"
            ],
            "id" => 1            
        ]);

        return view('welcome')->with([
            'data' => $data->json(),
            'historyCollection' => $this->getLastDays($daysToFilter)
        ]);
    }

    private function getLastDays($daysToFilter)
    {

        $response = Http::post(env('WEATHER_BASE_URL').'/api/2.0/weathers/lastdays', [
            "jsonrpc" => "2.0", 
            "method" => "weather.getHistory", 
            "params" => [
                "lastDays" => $daysToFilter
            ],
            "id" => 1            
        ]);
        return $response->json()['data'];
    }
}
