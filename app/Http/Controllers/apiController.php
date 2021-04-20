<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function apiCoin($tipo,$coin)
    {
        $client = new Client();
        $url = "https://economia.awesomeapi.com.br/".$tipo."/".$coin;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());      
        return view('projects.apiwithoutkey', compact('responseBody'));
    }
}
