<?php

namespace App\Http\Controllers;

use App\Services\SoapService; 

class SoapController extends Controller
{
    protected $soapService;

    public function __construct(SoapService $soapService)
    {
        $this->soapService = $soapService;
    }
    public function credential()
    {  
        $url = config('24-seven-office.authenticate.url');
        $body = config('24-seven-office.authenticate.body');
        try {
            $response    = $this->soapService->call($url, $body);
            $login_token = formatXml($response);
            session()->put('24-seven-office-token', json_encode($login_token->LoginResult[0]));
            return response()->json([
                "status" => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "error" => $th->getMessage()
            ]);
        }
    }
    public function GetProducts()
    {
        // Prepare the SOAP XML payload
        $xml = '
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <GetProducts xmlns="http://24sevenOffice.com/webservices">
                        <searchParams>
                            <Id>1000</Id>
                            <CategoryId>1</CategoryId>
                        </searchParams>
                        <returnProperties>
                            <string>Name</string>
                            <string>Price</string>
                        </returnProperties>
                    </GetProducts>
                </soap:Body>
            </soap:Envelope>
        ';
        // Make the SOAP call using the SoapService
        $response = $this->soapService->call('https://api.24sevenoffice.com/Logistics/Product/V001/ProductService.asmx', $xml);

        // Process the SOAP response
        // ...
        return $response;
        return response()->json(['response' => $response]);
    }
    public function SaveInvoices()
    {
    }
}
