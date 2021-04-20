<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\cotacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class apiController extends Controller
{
    public function apiCoin()
    {
        $client = new Client();
        $url = "https://economia.awesomeapi.com.br/json/all";           
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
       $money = json_decode($response->getBody(), true);       

       $historic = cotacao::where('id_user', Auth::user()->id)->orderBy('id','DESC')->get();

       return view('home', compact('money', 'historic'));
    }
    public function apiUsers()
    {       
       $users = User::all(); 
       return view('users', compact('users'));
    }
    public function searchCoin(Request $request)
    {    
       $client = new Client();
       $coin = $request->get('coin');
        $url = "https://economia.awesomeapi.com.br/last/".$coin;           
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $money = json_decode($response->getBody(), true);    
        
        foreach ($money as $key => $value) {
            cotacao::create(['id_user'=>Auth::user()->id, 
            'coin'=>$value['code'], 'name'=> $value['name'],
            'high'=>$value['high'], 'low'=>$value['low'] ]);
        }       

        return $money;
    }
}
