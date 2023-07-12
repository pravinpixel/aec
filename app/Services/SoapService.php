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
                'Cookie'       => token24Seven()
            ],
            'body' => $xml,
        ]);
        return $response->getBody()->getContents();
    }
}
