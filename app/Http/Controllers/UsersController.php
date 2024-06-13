<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    public function index()
    {
        $url = 'https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json';
        
        $response = Http::get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Unable to fetch news'], 500);
        }
    }
}
