<?php

namespace App\Services;

use GuzzleHttp\Client;

class SoapService
{
    protected $client;

    public function __construct()
    {
        
        $this->client = new Client();
    }

    public function call($url, $xml)
    {
        $response = $this->client->post($url, [
            'headers' => [
                'Content-Type' => 'text/xml; charset=utf-8',
                'Cookie' => 'ASP.NET_SessionId=g3aywprauddamfxmu2mnp0n5'
            ],
            'body' => $xml,
        ]);  
        return $response->getBody()->getContents();
    }
}
